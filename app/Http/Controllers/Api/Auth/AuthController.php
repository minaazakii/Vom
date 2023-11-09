<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        User::create($request->validated());
        return response()->json(['message' => 'User Registered Successfully'], 200);
    }

    public function login(LoginRequest $request)
    {
        $check = Auth::attempt($request->validated());

        if (!$check) {
            return response()->json(['message' => 'Wrong Email Or Password'], 422);
        }
        $user = User::where('email', $request->email)->first();
        return response()->json(
            [
                'message' => 'Logged In Successfully',
                'user' => $user,
                'token'=>$user->createToken($user->email)->plainTextToken
            ],
            200
        );
    }
}
