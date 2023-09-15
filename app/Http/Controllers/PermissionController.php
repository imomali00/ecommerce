<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionToRoleRequest;
use App\Http\Requests\StorePermissionRequest;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Permission::class, 'permission');
    }

    public function index(): JsonResponse
    {
        return $this->response(Permission::all());
    }

    public function store(StorePermissionRequest $request): JsonResponse
    {
        if (Permission::query()->where('name', $request->name)->exists()) {
            return $this->error('persmission already exists');
        }

        $permission = Permission::create(['name' => $request->name, "guard_name" => "web"]);

        return $this->success('permission created', $permission);
    }

    public function assign(AssignPermissionToRoleRequest $request): JsonResponse
    {
        $permission = Permission::findOrFail($request->permission_id);
        $role = Role::findOrFail($request->role_id);

        if ($role->hasPermissionTo($permission->name)) {
            return $this->error('permission already assigned');
        }

        $role->givePermissionTo($permission->name);

        return $this->success('permission assigned to role');
    }
}
