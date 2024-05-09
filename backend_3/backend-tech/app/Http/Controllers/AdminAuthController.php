<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{

    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:admins,email',
            'password' => 'required|string|confirmed'
        ]);

        $admin = Admin::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $admin->createToken('myapptoken')->plainTextToken;
        $response = [
            'admin' => $admin,
            'token' => $token
        ];

        return response($response, 201);
    }
    // Show the admin login form
    public function showLoginForm()
    {
        return view('admin.login'); // You should create this view
    }

    // Handle admin login
//    public function login(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        if (Auth::guard('admin')->attempt($credentials)) {
//            // Authentication passed...
//            return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard or any other page
//        }
//
//        // Authentication failed...
//        return back()->withErrors(['email' => 'Invalid credentials']);
//    }
    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = Admin::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'admin' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
