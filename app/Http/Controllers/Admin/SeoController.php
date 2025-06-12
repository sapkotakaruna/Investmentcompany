<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Seo\UpdateSeoValidation;
use App\Models\Seo;

class SeoController extends BaseController
{
    //properties
    protected $base_route = 'admin.seo';
    protected $view_path = 'admin.seo';
    protected $panel = 'SEO';
    protected $folder = 'seo';
    protected $folder_path;


    public function __construct(Seo $model)
    {
        $this->model = $model;
        $this->folder_path = 'images' . DIRECTORY_SEPARATOR . $this->folder;
        $this->generateAllMiddlewareByPermission();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['row'] = Seo::first();
        return view(parent::loadCommonDataToView($this->view_path . '.edit'), compact('data'));
    }

    public function update(UpdateSeoValidation $request, $id)
    {
        $row = $this->model->find($id);

        $row->update($request->validated());

        $request->session()->flash('success_message', $this->panel . ' ' . $row->title . ' updated Successfully');
        return redirect()->route($this->base_route . '.index');
    }
}
