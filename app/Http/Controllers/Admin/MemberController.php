<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Member\StoreMemberValidation;
use App\Http\Requests\Admin\Member\UpdateMemberValidation;
use App\Models\Member;
use App\Models\MemberCategory;
use App\Repository\Crud\CrudInterface;
use App\Services\CrudService;
use Illuminate\Http\Request;


class MemberController extends BaseController
{
    //properties
    protected $base_route = 'admin.member';
    protected $view_path = 'admin.member';
    protected $panel = 'Member';
    protected $folder = 'member';
    protected $folder_path;
    protected $crud;
    protected $service;
    protected $naya_base_route = 'admin.member-category';


    public function __construct(CrudInterface $crud, Member $model, CrudService $service)
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
    public function store(StoreMemberValidation $request)
    {
        $slug = MemberCategory::find($request->member_category_id)->slug;
        $this->processImage($request['main_photo']);
        $data['photo'] = $this->file_name;
        $data = $this->crud->store($this->model, $request, $data['photo'], 'photo');
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
    public function update(UpdateMemberValidation $request, $id)
    {

        $row = $this->model->find($id);
        $slug = MemberCategory::find($row->member_category_id)->slug;

        $data = $request->validated();

        if ($request->hasFile('main_photo')) {
            $this->processImage($data['main_photo']);
            $data['photo'] = $this->file_name;
            //remove old photo
            @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row->photo);
        }

        $row->update($data);

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
        $slug = memberCategory::find($row->member_category_id)->slug;
        parent::rowExist($row);
        //remove old photo
        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row->photo);

        $row->delete();

        return redirect()->route($this->naya_base_route . '.index', ['slug' => $slug])
        ->with('success_message', $this->panel . ' sorted Successfully');
       
    }
    public function sort(Request $request)
    {
        $id = Member::whereIn('id', $request->ids)->first()->member_category_id;
        $slug = MemberCategory::find($id)->slug;
        $this->service->sort($request, $this->model);
        return redirect()->route($this->naya_base_route . '.index', ['slug' => $slug])
            ->with('success_message', $this->panel . ' sorted Successfully');
    }

    protected function loadRequiredData()
    {
        $data['member_category'] = MemberCategory::active()->pluck('title', 'id');
        return $data;
    }

    public function memberCategory($slug)
    {
        $data = [];
        $data['memberCategorySlug'] = $slug;
        $data['member_category'] = MemberCategory::where('slug', $slug)->first()->id;
        $data['rows'] = $this->model->whereMemberCategoryId($data['member_category'])->orderBy('rank')->get();
        return view(parent::loadCommonDataToView($this->view_path . '.index'), compact('data'));
    }

    public function memberCategoryCreate($slug)
    {
        $data = [];
        $data['member_category'] = MemberCategory::where('slug', $slug)->first()->id;
        return view(parent::loadCommonDataToView($this->view_path . '.create'), compact('data'));
    }
}
