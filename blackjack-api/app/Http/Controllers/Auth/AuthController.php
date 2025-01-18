<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Validate request data.
        $credentials = $request->validated();
        // Check if user with the email exists.
        $user = User::whereEmail($credentials['email'])->first();
        // Check if the password is correct (password must be compared decrypted).
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 400);
        }

        $token = $user->createToken('loginToken')->accessToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => [
                'id' => $user->uuid,
                'nickname' => $user->nickname
            ]
        ], 200);
    }
}
