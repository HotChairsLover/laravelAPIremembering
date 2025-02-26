<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentShowResource;
use App\Models\Department;
use App\Repositories\DepartmentRepository;

class DepartmentController extends Controller
{
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = $this->departmentRepository->getAllWithPaginate(15);
        return DepartmentResource::collection($departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $result = app(StoreDepartmentAction::class)($request->input());

        return new DepartmentShowResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return new DepartmentShowResource($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $result = app(UpdateDepartmentAction::class)($request->input(), $department);

        return new DepartmentShowResource($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteDepartmentRequest $request, Department $department)
    {
        $result = $department->delete();

        return $result;
    }
}
