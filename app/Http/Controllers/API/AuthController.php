<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validation error', $validator->errors(), 422);
        }

        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);

            return ApiResponse::success('User registered successfully', $user, 201);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to register user', $e->getMessage(), 500);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);
        if (!Auth::attempt($credentials)) {
            return ApiResponse::error('Invalid email or password', null, 401);
        }
        $user = Auth::user();
        $token = $user->createToken('mobile_token')->plainTextToken;

        return ApiResponse::success('Login successful', [
            'user_id' => $user->id,
            'name'    => $user->name,
            'email'   => $user->email,
            'token'   => $token
        ], 200);
    }


    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return ApiResponse::success('Logout successful', null, 200);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to logout', $e->getMessage(), 500);
        }
    }
}
