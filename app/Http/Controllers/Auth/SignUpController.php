<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
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
            'email' => 'required|email|unique:users|max:255',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
            ],
        ]);

        // Store user in the database
        User::create([
            'name' => ucwords(strtolower($request->name)),
            'surname' => ucwords(strtolower($request->surname)),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
        ]);

        // Sign in and redirect the user
        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('dashboard');
    }
}
