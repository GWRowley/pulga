<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Academy;
use App\Models\Member;

class TimetableController extends Controller
{
    // Only viewable if logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // All classes view
    public function index() {
        $hasAcademy = Academy::where('user_id', '=', Auth::user()->id)->exists();
       
        if ($hasAcademy) {
         } else {
            return redirect()->route('create-academy')->with('danger', 'You must create an academy first');
        }
        return view('timetable.index');
    }
}
