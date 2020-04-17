<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\RoleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return json_success(RoleResource::collection(Role::all()));
    }

    public function show(Role $role)
    {
        return json_success(new RoleResource($role));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        return json_created(new RoleResource($role));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return json_success(new RoleResource($role));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return json_blank();
    }

    public function permissions(Role $role)
    {
        return json_success(PermissionResource::collection($role->permissions));
    }

    public function assignPermissions(Role $role, Request $request)
    {
        $role->syncPermissions($request->input('permissions', []));
        return json_blank();
    }


}
