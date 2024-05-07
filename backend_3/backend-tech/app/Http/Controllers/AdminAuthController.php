<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAuthController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
//        return view('admin.login'); // You should create this view
    }

    // Handle admin login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
//        if (Auth::guard('admin')->attempt($credentials)) {
//            // Authentication passed...
//            return response()->json(['message' => 'Login successful'], 200);
//        }
//
//        // Authentication failed...
//        return response()->json(['message' => 'Invalid credentials'], 401);


        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard or any other page
        }

        // Authentication failed...
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
