<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\File\StoreFileValidation;
use App\Http\Requests\Admin\File\UpdateFileValidation;
use App\Models\File;


class FileController extends BaseController
{
    //properties
    protected $base_route = 'admin.file';
    protected $view_path = 'admin.file';
    protected $panel = 'File';
    protected $folder = 'file';
    protected $folder_path;


    public function __construct(File $model)
    {
        $this->model = $model;
        $this->folder_path = 'images' . DIRECTORY_SEPARATOR . $this->folder;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Session::put('success_message','Successfully Loaded '. $this->panel);
        $data = [];
        $data['rows'] = $this->model->latest()->paginate(config('helper.pagination_limit'));

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
    public function store(StoreFileValidation $request)
    {
        $data=$request->validated();
        if($request->hasFile('main_file')){
            $this->processImage($data['main_file']);
            $data['file'] = $this->file_name;
        }
        $file = $this->model->create($data);

        $request->session()->flash('success_message', $this->panel.' '.$file->name. ' added Successfully');
        return redirect()->route($this->base_route.'.index');
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
        $data ['row'] = $this->model->find($id);
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
    public function update(UpdateFileValidation $request, $id)
    {
        $row = $this->model->find($id);
        $data = $request->validated();
        if($request->hasFile('main_file')){
            $this->processImage($data['main_file']);
            $data['file'] = $this->file_name;
            //remove
            $this->removeFile($this->folder_path.DIRECTORY_SEPARATOR.$row->file);
        }
        $row->update($data);

        $request->session()->flash('success_message',$this->panel.' '. $row->name . ' updated Successfully');
        return redirect()->route($this->base_route.'.index');
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

        $row->delete();

        return redirect()->route($this->base_route.'.index')
            ->with('success_message', $this->panel . ' deleted Successfully');
    }
}
