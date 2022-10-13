<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academy;
use App\Models\User;

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
            return back()->with('status', 'The login details you entered were incorrect');
        }

        // Redirect them to the dashboard if they have an academy, else
        // redirect the user to the create academy page.
        if (Academy::where('user_id', '=', Auth::user()->id)->exists()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('create-academy');
        }
    }
}
