<?php

namespace App\Http\Controllers\Api;

use App\Enums\Authorization\Roles;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserListResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // if(!Auth::user()->can('delte articles')){
        //     abort(403);
        // }
        $users = User::where('name', '!=', 'superuser')->get();
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
            if(($key = array_search('superuser', $roles)) !== false) unset($roles[$key]);
            $user->syncRoles($roles);
        }  
        if(empty($roles)){
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

    public function getUser()
    {
        return Auth::user();
    }
}
