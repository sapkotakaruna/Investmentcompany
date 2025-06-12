<?php


namespace App\Repository\Crud;



use App\Models\Employee\Employee;
use App\Models\Slider;
use App\Repository\Crud\CruidInterface;
use App\Services\AttendanceSheetService;
use App\Services\CrudService;
use App\Services\DeviceCruidService;
use function is;
use function is_null;

class CrudRepository implements CrudInterface
{

    public function __construct(CrudService $service,)
    {
        $this->service = $service;
    }
    public function getAllData($model)
    {
        return $this->service->index($model);
    }
    public function create() {}

    public function store($model, $request, $image = null, $attributes = null)
    {
        if ($image == null) {
            $data = $this->service->store($model, $request);
        } else {
            $data = $this->service->store($model, $request, $image, $attributes);
        }
        return $data;
    }

    public function update($id, $request, $model, $image = null, $attributes = null)
    {
        if ($image == null) {
            $data = $this->service->update($id, $model, $request);
        } else {
            $data = $this->service->update($id, $model, $request, $image, $attributes);
        }
    }

    public function view($id, $model) {}

    public function delete($id, $model, $base_route)
    {
        $row = $model->find($id);
        if (!$row) {
            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($base_route . '.index')->send();
        } else {
            return $row->delete();
        }
    }
}
