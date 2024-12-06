<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class BaseService
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return  $this->model->orderby('id')->paginate(10);
    }

    public function show($id)
    {
        return $this->model->findOrfail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $this->model->findOrFail($id);
        return $this->model->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);         
        return $data->delete();
    }
}
