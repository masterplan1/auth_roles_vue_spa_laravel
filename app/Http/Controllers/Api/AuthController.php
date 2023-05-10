<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'boolean'
        ]);
        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if(! Auth::attempt($credentials, $remember)){
            return response(['message' => 'Email or Password is incorrect'], 422);
        }

        /** @var \App\Http\Models\User $user */
        $user = Auth::user();
        $token = $user->createToken('main', ['post:create'])->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout()
    {   
        /** @var \App\Http\Models\User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response('', 204);
    }
}
