<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Interest\StoreInterestValidation;
use App\Http\Requests\Admin\Interest\UpdateInterestValidation;
use App\Models\Interest;
use App\Models\InterestCategory;
use App\Models\InterestParent;
use App\Models\IntrestCategory;
use App\Repository\Crud\CrudInterface;
use App\Services\CrudService;
use Illuminate\Http\Request;


class InterestController extends BaseController
{
    //properties
    protected $base_route = 'admin.interest';
    protected $view_path = 'admin.interest';
    protected $panel = 'Interest';
    protected $folder = 'interest';
    protected $folder_path;
    protected $crud;
    protected $service;
    protected $naya_base_route = 'admin.interest-category';


    public function __construct(CrudInterface $crud, InterestParent $model, CrudService $service)
    {
        $this->model = $model;
        $this->crud = $crud;
        $this->service = $service;
        $this->folder_path = 'images' . DIRECTORY_SEPARATOR . $this->folder;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model->orderBy('rank')->paginate(config('helper.pagination_limit'));
        return view(parent::loadCommonDataToView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->loadRequiredData();
        return view(parent::loadCommonDataToView($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInterestValidation $request)
    {
        $slug = IntrestCategory::find($request->interest_category_id)->slug;
        $data['photo'] = $this->file_name;
        $data = $this->crud->store($this->model, $request, $data['photo'], 'photo');

        $this->interest($request, $data['id']);
        $request->session()->flash('success_message', $this->panel . ' ' . $data['title'] . ' added Successfully');
        return redirect()->route($this->naya_base_route . '.index', ['slug' => $slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);
        parent::rowExist($data['row']);
        return view(parent::loadCommonDataToView($this->view_path . '.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data = $this->loadRequiredData();
        $data['row'] = $this->model->find($id);
        parent::rowExist($data['row']);

        return view(parent::loadCommonDataToView($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInterestValidation $request, $id)
    {

        $row = $this->model->find($id);
        $slug = IntrestCategory::find($row->interest_category_id)->slug;
        $data = $request->validated();


        $row->update($data);
        $this->interest($request, $id);
        $request->session()->flash('success_message', $this->panel . ' ' . $row->name . ' updated Successfully');
        return redirect()->route($this->naya_base_route . '.index', ['slug' => $slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = $this->model->find($id);
        $cat_id = InterestParent::where('id', $id)->first()->interest_category_id;
        $slug = IntrestCategory::find($cat_id)->slug;

        parent::rowExist($row);
        //remove old photo
        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row->photo);

        $row->delete();

        return redirect()->route($this->naya_base_route . '.index', ['slug' => $slug])
            ->with('success_message', $this->panel . ' deleted Successfully');
    }
    public function sort(Request $request)
    {
        $id = InterestParent::whereIn('id', $request->ids)->first()->interest_category_id;
        $slug = IntrestCategory::find($id)->slug;
        $this->service->sort($request, $this->model);
        return redirect()->route($this->naya_base_route . '.index', ['slug' => $slug])
            ->with('success_message', $this->panel . ' sorted Successfully');
    }

    protected function loadRequiredData()
    {
        $data['Interest_category'] = IntrestCategory::active()->pluck('title', 'id');
        return $data;
    }

    public function InterestCategory($slug)
    {
        $data = [];
        $data['InterestCategorySlug'] = $slug;
        $data['Interest_category'] = IntrestCategory::where('slug', $slug)->first()->id;
        $data['rows'] = $this->model->whereInterestCategoryId($data['Interest_category'])->orderBy('rank')->get();
        return view(parent::loadCommonDataToView($this->view_path . '.index'), compact('data'));
    }

    public function InterestCategoryCreate($slug)
    {
        $data = [];
        $data['Interest_category'] = IntrestCategory::where('slug', $slug)->first()->id;
        return view(parent::loadCommonDataToView($this->view_path . '.create'), compact('data'));
    }
    protected function interest($request, $id)
    {
        if ($request->has('interestData')) {
            Interest::where('parent_id', $id)->delete();
            foreach ($request->get('interestData') as $key => $item) {
                if ($item['schemes'] != null) {
                    Interest::updateOrCreate([
                        'parent_id' => $id,
                        'schemes' => $item['schemes'],
                        'interest_rate' => $item['Interest_rate'],
                    ], ['id' => $item['id'] ?? null]);
                }
            }
        }
    }
}
