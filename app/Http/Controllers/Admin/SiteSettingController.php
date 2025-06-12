<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SiteSetting\UpdateSiteSettingValidation;
use App\Models\Hour;

use App\Models\Web\Menu;
use App\Models\SiteSetting;



class SiteSettingController extends BaseController
{
    //properties
    protected $base_route = 'admin.siteSetting';
    protected $view_path = 'admin.siteSetting';
    protected $panel = 'SiteSetting';
    protected $folder = 'siteSetting';
    protected $folder_path;


    public function __construct(SiteSetting $model)
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
        $data = [];
        $data['row'] = SiteSetting::first();



        return view(parent::loadCommonDataToView($this->view_path . '.edit'), compact('data'));
    }

    public function update(UpdateSiteSettingValidation $request)
    {
        $row = $this->model->first();

        $data = $request->validated();
        if ($request->hasFile('main_logo')) {
            $data['logo'] = $this->storeImage($request, 'main_logo', 'logo', $row);
        }
        if ($row) {
            $row->update($data);



            $this->hour($request, $row);
        } else {
            $row = $this->model->create($data);


            $this->hour($request, $row);
        }

        $request->session()->flash('success_message', $this->panel . ' ' . $row->title . ' updated Successfully');
        return redirect()->route($this->base_route . '.index');
    }

    protected function storeImage($request, $fileKey, $databaseKey, $row = null)
    {
        if ($request->hasFile($fileKey)) {
            $this->processImage($request[$fileKey]);
            $fileName = $this->file_name;
            //remove
            if ($row) {
                @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $row[$databaseKey]);
            }
            return $fileName;
        }
        return null;
    }
}
