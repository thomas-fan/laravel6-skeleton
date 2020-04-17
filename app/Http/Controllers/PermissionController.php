<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        return json_success(PermissionResource::collection(Permission::all()));
    }

    public function show(Permission $permission)
    {
        return json_success(new PermissionResource($permission));
    }

    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());
        return json_created(new PermissionResource($permission));
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());
        return json_success(new PermissionResource($permission));
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return json_blank();
    }
}
