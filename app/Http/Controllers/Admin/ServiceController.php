<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Service\StoreServiceValidation;
use App\Http\Requests\Admin\Service\UpdateServiceValidation;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Repository\Crud\CrudInterface;
use App\Services\CrudService;
use Illuminate\Http\Request;


class ServiceController extends BaseController
{
    //properties
    protected $base_route = 'admin.service';
    protected $view_path = 'admin.service';
    protected $panel = 'Service';
    protected $folder = 'service';
    protected $folder_path;
    protected $crud;
    protected $service;


    public function __construct(CrudInterface $crud, Service $model, CrudService $service)
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

    public function store(StoreServiceValidation $request)
    {


 
        if ($request->hasFile('main_photo')) {
            $this->processImage($request['main_photo']);
            $data['photo'] = $this->file_name;
            $data = $this->crud->store($this->model, $request, $data['photo'], 'photo');
        } else {
            $data = $this->crud->store($this->model, $request);
        }
        $request->session()->flash('success_message', $this->panel . ' ' . $data['title'] . ' added Successfully');
        return redirect()->route($this->base_route . '.index');
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
    public function update(UpdateServiceValidation $request, $id)
    {
        $row = $this->model->find($id);
        $data = $request->validated();
        if ($request->hasFile('main_photo')) {
            $this->processImage($data['main_photo']);
            $data['photo'] = $this->file_name;
            //remove old photo
            @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row->photo);
        }

        $row->update($data);

        $request->session()->flash('success_message', $this->panel . ' ' . $row->name . ' updated Successfully');
        return redirect()->route($this->base_route . '.index');
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
        parent::rowExist($row);
        //remove old photo
        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row->photo);

        $row->delete();

        return redirect()->route($this->base_route . '.index')
            ->with('success_message', $this->panel . ' deleted Successfully');
    }
    public function sort(Request $request)
    {
        $this->service->sort($request, $this->model);
        return redirect()->route($this->base_route . '.index')
            ->with('success_message', $this->panel . ' sorted Successfully');
    }

    protected function loadRequiredData()
    {
        $data['service_category'] = ServiceCategory::active()->pluck('name', 'id');
        return $data;
    }
}
