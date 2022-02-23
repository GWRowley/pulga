<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    // All students
    public function index() {
        $users = User::select('id', 'name', 'surname', 'email')->get();
        return view('students.index')->with([
            'users' => $users
        ]);
    }

    // Add student
    public function add() {
        return view('students.add-student');
    }
}
