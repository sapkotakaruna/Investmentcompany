<?php

namespace App\Repository\Crud;

interface CrudInterface
{
    public function getAllData($model);
    public function store($model, $request, $image = null, $attributes = null);
    public function Update($id, $request, $model, $image = null, $attributes = null);
    public function view($id, $model);
    public function delete($id, $model, $base_route);
}
