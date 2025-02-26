<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Account Created Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request['email'])->firstOfFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => ' LoggedIn Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    public function logout()
    {

    }
}
