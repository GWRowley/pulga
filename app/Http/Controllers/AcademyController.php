<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use App\Models\Academy;
use App\Models\User;


class AcademyController extends Controller
{
    // Only see if logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // Dashboard 
    public function index() {
        $hasAcademy = Academy::where('user_id', '=', Auth::user()->id)->exists();
        // If you already have an academy, show the dashboard
        if ($hasAcademy) {
            return view('dashboard');            
        } else {
            return redirect()->route('create-academy')->with('danger', 'You must create an academy first');
        }
    }
        
    // Create academy view
    public function create() {
        $hasAcademy = Academy::where('user_id', '=', Auth::user()->id)->exists();
        // If you already have an academy, redirect with error to dashboard
        if ($hasAcademy) {
            return redirect()->route('dashboard')->with('danger', 'You have already created an academy');
        } else {
            return view('academy.create-academy');
        }
    }

    // Storing academy
    public function store(Request $request)
    {   
        $hasAcademy = Academy::where('user_id', '=', Auth::user()->id)->exists();
        // If you already have an academy, redirect with error to dashboard
        if ($hasAcademy) {
            return redirect()->route('dashboard')->with('danger', 'You have already created an academy');
        } else {
            // Validation for new member
            $this->validate($request, [
                'name' => 'required|max:255',
                'head_coach' => 'required|max:255',
                'avatar_id' => 'required',
                'avatar' => 'mimes:jpg,png,jpeg|max:5048',    
            ]);

            // Check to see if the avatar has a file added
            if ($request->hasFile('avatar')) {
            // Create unique file name for each avatar
            $avatarFileName = strtolower($request->name) . '-' . $request->avatar_id . '.' . $request->avatar->extension();
            // Add avatar to the public folder
            $request->avatar->move(public_path('images/academy-avatars'), $avatarFileName);
            } else {
                $avatarFileName = null;
            }

            // Store academy in the database
            $request->user()->academy()->create([
                'name' => ucwords(strtolower($request->name)),
                'head_coach' => ucwords(strtolower($request->head_coach)),
                'avatar_id' => $request->avatar_id,
                'avatar' => $avatarFileName,
            ]);

            // Redirect to dashboard and show success message     
            return redirect()->route('dashboard')->with('success', 'Academy created');middleware(['auth']);
        }      
    }
}