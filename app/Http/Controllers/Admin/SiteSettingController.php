<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SiteSetting\UpdateSiteSettingValidation;
use App\Models\Hour;
use App\Models\Interest;
use App\Models\Web\Menu;
use App\Models\SiteSetting;
use App\Models\StatCat;
use App\Models\StatisticsDetail;

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
        $data['statisticsCategoty'] = StatCat::pluck('title', 'id');


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


    protected function storeStatisticsDataEdit(Request $request, SiteSetting $gallery)
    {
        $gallery_image_ids = [];

        if ($request->has('gallery')) {
            $rank_key = 0;
            foreach ($request->get('gallery') as $key => $item) {
                $gallery_image_id =  isset($item['id']) ? $item['id'] : false;
                if ($gallery_image_id) {
                    $gallery_image = StatisticsDetail::find($gallery_image_id);
                    $file = $request->file('gallery.' . $key . '.gallery_image');
                    if ($file) {
                        //upload new image
                        $this->processImage($file, config('helper.gallery_image'));
                        //remove old image and thumbnails
                        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . $gallery_image->image);
                        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . '1600_1200_' . $gallery_image->image);
                        @$this->removeFile($this->folder_path . DIRECTORY_SEPARATOR . '200_150_' . $gallery_image->image);
                    }

                    $gallery_image->update([
                        'image'      => $file ? $this->file_name : $gallery_image->image,
                        'alt_text'   => $item['alt_text'],
                        'caption'    => $item['caption'],
                        'rank'       => $rank_key,
                        'status'     => $item['status'],
                    ]);

                    $gallery_image_ids[] = $gallery_image_id;
                } else {
                    //add
                    $file = $request->file('gallery.' . $key . '.gallery_image');
                    if ($file) {
                        $gallery_image = StatisticsDetail::create([
                            'gallery_id' => $gallery->id,
                            'alt_text'   => $item['alt_text'],
                            'caption'    => $item['caption'],
                        ]);

                        $gallery_image_ids[] = $gallery_image->id;
                    }
                }
            }
        } else {
            StatisticsDetail::where('gallery_id', $gallery->id)->delete();
        }
    }

    protected function removeGalleries($id)
    {
        StatisticsDetail::where('gallery_id', $id)->delete();
    }

    protected function hour($request, $row)
    {
        if ($request->has('hourData')) {
            Hour::where('site_setting_id', $row->id)->delete();
            foreach ($request->get('hourData') as $key => $item) {
                if ($item['excerpt'] != null) {
                    Hour::updateOrCreate([
                        'site_setting_id' => $row->id,
                        'excerpt' => $item['excerpt'],
                    ], ['id' => $item['id'] ?? null]);
                }
            }
        }
    }
}
