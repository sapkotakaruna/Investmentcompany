<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\Slider\StoreSliderValidation;
use App\Http\Requests\Admin\Slider\UpdateSliderValidation;
use App\Models\Slider;
use App\Repository\Crud\CrudInterface;
use App\Services\CrudService;
use Illuminate\Http\Request;


class SliderController extends BaseController
{
    //properties
    protected $base_route = 'admin.slider';
    protected $view_path = 'admin.slider';
    protected $panel = 'Slider';
    protected $folder = 'slider';

    protected $file_request = 'main_photo';
    protected $file_attributes = 'photo';
    protected  $message = 'title';
    protected $folder_path;
    protected $crud;
    protected $service;


    public function __construct(CrudInterface $crud, Slider $model, CrudService $service)
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
        $data['rows'] = $this->crud->getAllData($this->model)->sortByDesc('created_at');
        return view(parent::loadCommonDataToView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(parent::loadCommonDataToView($this->view_path . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderValidation $request)
    {
        if ($request->hasFile($this->file_request)) {
            $this->processImage($request[$this->file_request]);
            $data[$this->file_attributes] = $this->file_name;
            $data = $this->crud->store($this->model, $request, $data[$this->file_attributes], 'photo');
        } else {

            $data = $this->crud->store($this->model, $request);
        }
        $request->session()->flash('success_message', $this->panel . ' ' . $data[$this->message] . ' added Successfully');

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
    public function update(UpdateSliderValidation $request, $id)
    {

        $row = $this->model->find($id);
        if ($request->hasFile($this->file_request)) {
            $this->processImage($request[$this->file_request]);
            $data[$this->file_attributes] = $this->file_name;
            @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row[$this->file_attributes]);
            $data = $this->crud->update($id, $request, $this->model, $data[$this->file_attributes], 'photo');
        } else {
            $data = $this->crud->update($id, $request, $this->model);
        }

        $request->session()->flash('success_message', $this->panel . ' ' . $request[$this->message] . ' updated Successfully');
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
        $this->crud->delete($id, $this->model, $this->base_route);
        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row[$this->file_attributes]);
        return redirect()->route($this->base_route . '.index')
            ->with('success_message', $this->panel . ' deleted Successfully');
    }
    public function sort(Request $request)
    {
        if ($request->has('ids')) {
            $this->service->sort($request, $this->model);
        }

        return redirect()->route($this->base_route . '.index')
            ->with('success_message', $this->panel . ' sorted Successfully');
    }
}
