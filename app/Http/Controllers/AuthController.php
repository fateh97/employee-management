<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'User registered successfully']);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Try to authenticate using the "web" guard
        if (!Auth::guard('web')->attempt($validated)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        $user = Auth::guard('web')->user();

        // Create Sanctum token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return response()->json([
            'access_token' => JWTAuth::refresh(),
            'token_type' => 'bearer',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
