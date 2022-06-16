<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // If logged in stop user from seeing sign in page
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index() 
    {        
        return view('auth.forgot-password');
    }
}
