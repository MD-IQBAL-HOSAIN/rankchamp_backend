<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials); // Use JWTAuth here for consistency

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = JWTAuth::user(); // Fetch user with JWTAuth to ensure it's consistent
        return response()->json([
            'status' => 'success',
            'message' => 'Login Successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|confirmed|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json([
                'status' => 'success',
                'message' => 'Registration Successfully Done',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken()); // Explicitly invalidate the token
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        $newToken = JWTAuth::refresh(JWTAuth::getToken()); // Refresh token explicitly with JWTAuth
        return response()->json([
            'status' => 'success',
            'user' => JWTAuth::user(),
            'authorisation' => [
                'token' => $newToken,
                'type' => 'bearer',
            ]
        ]);
    }

public function index()
{
    $users = User::all();
    return response()->json([
        'status' => 'success',
        'message' => 'User list retrieved successfully',
        'users' => $users,
    ]);
}
}