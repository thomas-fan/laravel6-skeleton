<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $limit = $request->limit ?? $this->defaultPage;
        $admins = Admin::query()->paginate($limit);
        return json_page(AdminResource::collection($admins));
    }

    public function store(AdminRequest $request)
    {
        $admin = Admin::create($request->all());
        return json_created(new AdminResource($admin));
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $data = [
            'name' => $request->name
        ];
        if ($request->password !== $admin->password) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return json_success(new AdminResource($admin));
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
        return json_blank();
    }
}
