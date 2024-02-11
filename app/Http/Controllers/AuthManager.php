<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class AuthManager extends Controller
{
    public function login(Request $request)
    {
        try {
            // Validate login data
            $credentials = $request->validate([
                'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
                'password' => 'required',
            ]);
            

            // Attempt to authenticate the user
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                // Return user data and a token if needed
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken('authToken')->plainTextToken,
                ]);
            }

            // Authentication failed with incorrect credentials
            return response()->json(['error' => 'Invalid email or password. Please try again'], 401);
        } catch (\Exception $e) {
            // Handle other authentication exceptions
            return response()->json(['error' => 'Something went wrong. Please try again'], 500);
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
