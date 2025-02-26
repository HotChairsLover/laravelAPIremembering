<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeShowResource;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeRepository->getAllWithPaginate(15);
        return EmployeeResource::collection($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $result = app(StoreEmployeeAction::class)($request->input());

        return new EmployeeShowResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return new EmployeeShowResource($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $result = app(UpdateEmployeeAction::class)($request->input(), $employee);

        return new EmployeeShowResource($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEmployeeRequest $request, Employee $employee)
    {
        $result = $employee->delete();

        return $result;
    }
}
