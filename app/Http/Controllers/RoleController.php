<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleShowResource;
use App\Models\Role;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleRepository->getAllWithPaginate(15);
        return RoleResource::collection($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = app(StoreRoleAction::class)($request->input());

        return new RoleShowResource($role);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RoleShowResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role = app(UpdateRoleAction::class)($request->input(), $role);

        return new RoleShowResource($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteRoleRequest $request, Role $role)
    {
        $result = $role->delete();

        return $result;
    }
}
