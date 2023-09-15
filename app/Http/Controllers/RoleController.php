<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignRoleToUserRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }


    public function index(): JsonResponse
    {
        return $this->response(Role::all());
    }


    public function store(StoreR oleRequest $request): JsonResponse
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);

        return $this->success('role created', $role);
    }


    public function assign(AssignRoleToUserRequest $request): JsonResponse
    {
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        $user->assignRole($role->name);

        return $this->success('role assigned');
    }
}
