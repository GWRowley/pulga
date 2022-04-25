<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignOutController extends Controller
{
    public function store()
    {
        auth()->logout();

        return redirect()->route('sign-in')->with('success', 'You have been signed out');
    }
}
