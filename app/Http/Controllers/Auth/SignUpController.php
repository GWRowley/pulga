<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{   
    // If logged in stop user from seeing sign up page
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index() 
    {
        return view('auth.sign-up');
    }

    public function store(Request $request)
    {
        // Validation for sign up form
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // Store user in the database
        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Sign in and redirect the user
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('dashboard');
    }
}
