<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Potentially dont need 2 lines below...
use App\Models\Member;
use App\Models\User;

class CompetitionController extends Controller
{
    // Only viewable if logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // All classes view
    public function index() {
        return view('competitions.index');
    }
}
