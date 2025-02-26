<?php

namespace App\Repositories;

abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions()
    {
        return clone $this->model;
    }

    public function getById($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAll()
    {
        return $this->startConditions()->select()->get();
    }

    public function getAllIds()
    {
        return $this->startConditions()->select('id')->get();
    }

    public function getAllWithPaginate($perPage)
    {
        return $this->startConditions()->select()->paginate($perPage);
    }
}
