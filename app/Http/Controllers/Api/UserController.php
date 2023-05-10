<?php

namespace App\Http\Controllers\Api;

use App\Enums\Authorization\Roles;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserListResource::collection($users);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => 'string|email',
            'name' => 'string',
            'roles' => 'array|exists:roles,name'
        ]);
        $roles = $validated['roles'];
        unset($validated['rolse']);

        if(!empty($roles)){
            $user->syncRoles($roles);
        } else {
            $user->assignRole(Roles::Guest->value);
        }

        $user->update($validated);

        return new UserResource($user);
    }

    public function remove(User $user)
    {
        $user->delete();
        return response('', 204);
    }
}
