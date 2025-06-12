<?php

namespace App\Services;


use App\Http\Controllers\Admin\BaseController;
use App\Models\Branch;
use App\Models\FingerDevices;
use App\Models\MachineNumber;
use PhpParser\Node\Stmt\Static_;
use Rats\Zkteco\Lib\Helper\Device;

class CrudService extends BaseController
{
    public static function index($model)
    {
        $devices = $model->all();
        // Display the value of $models
        return $devices;
    }
    public static function create($submodel)
    {
        $datas = DeviceCruidService::requiredData($submodel, 'branch_name', 'id');
        $data = $datas;
        return $data;
    }
    public static function store($model, $request, $image = null, $attributes = null)
    {
        if ($image == null) {
            $data = $request->validated();
            $store = $model->create($data);
        } else {
            $data = $request->validated();
            $data[$attributes] = $image;
            $store = $model->create($data);
        }
        return $store;
    }


    public static function edit($model)
    {
        $datas = DeviceCruidService::requiredData($model, 'branch_name', 'id');
        $data = $datas;

        return $data;
    }
    public static function update($id, $model, $request, $image = null, $attributes = null)
    {
        $model = $model->find($id);
        if ($image == null) {
            $data = $request->validated();;
        } else {
            $data = $request->validated();
            $data[$attributes] = $image;
        }

        $update =  $model->update($data);


        return $update;
    }
    public static  function  requiredData($model, $name = null, $id = null)
    {
        $data = "";
        return $data;
    }

    public static  function  sort($request, $model)
    {
        foreach ($request->get('ids') as $key => $id) {
            $row = $model->find($id);
            $row->rank = $key + 1;
            $row->save();
        }



        return $row;
    }
}
