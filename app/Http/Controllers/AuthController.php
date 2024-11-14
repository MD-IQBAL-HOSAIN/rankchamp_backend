<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
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
                'password' => 'required|string|confirmed|min:8',
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
        $user = JWTAuth::user();
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
            'status' => 'success',
            'user_name' => $user->name,
            'message' => 'Successfully logged out',
        ]);
    }


    //for new token create
    public function refresh()
    {
        $newToken = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json([
            'status' => 'success',
            'user' => JWTAuth::user(),
            'authorisation' => [
                'token' => $newToken,
                'type' => 'bearer',
            ]
        ]);
    }

    //show all user
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'message' => 'User list retrieved successfully',
            'users' => $users,
        ]);
    }

    //Account Delete functions
    public function deleteAccount(Request $request)
    {
        $user = $request->user();

        // Revoke all tokens before deleting the account
        $user->tokens()->delete();

        // Delete the user account
        $user->delete();

        return response()->json([
            'status' => 'success',
            'user_name' => $user->name,
            'message' => 'Account deleted successfully'
        ]);
    }

    public function ProfileUpdate(Request $request)
    {
        try {
            // Get the currently authenticated user
            $authenticatedUser = Auth::user();

            // Update the user's profile information
            $authenticatedUser->name = $request->name;
            $authenticatedUser->email = $request->email;

            // Update password if provided
            if ($request->has('password')) {
                $authenticatedUser->password = Hash::make($request->password);
            }

            // Handle image upload if there's a new image
            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = public_path('/profile/image/');

                // Move the image to the public storage folder
                $image->move($imagePath, $imageName);
                $authenticatedUser->image = '/profile/image/' . $imageName;
            }


            // Update role if provided
            if ($request->has('role')) {
                $authenticatedUser->role = $request->role;
            }

            // Save the updated user data
            $authenticatedUser->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully',
                'user' => $authenticatedUser
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Profile update failed',
                'error' => $th->getMessage()
            ], 400);
        }
    }
}
