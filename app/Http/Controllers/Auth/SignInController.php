<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    // If logged in stop user from seeing sign in page
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index() 
    {        
        return view('auth.sign-in');
    }

    public function store(Request $request)
    {
        // Validation credentials
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Sign in and redirect the user
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'The login details you entered were incorrect.');
        }
        
        return redirect()->route('dashboard');
    }
}
