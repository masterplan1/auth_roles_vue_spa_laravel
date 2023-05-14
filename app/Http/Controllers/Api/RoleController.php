<?php

namespace App\Http\Controllers\Api;

use App\Enums\Authorization\Roles;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleListResource;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function getRoles()
    {
        return RoleListResource::collection(Role::where('name', '!=', Roles::Superuser->value)->get());
    }

    public function getRole(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'permissions' => 'array|exists:permissions,name',
            'role_name' => 'required|not_in:superuser'
        ]);

        $role->syncPermissions($validated['permissions']);

        // return new RoleResource($role);
        return true;
    }
}
