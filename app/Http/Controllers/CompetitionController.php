<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Competition;
use App\Models\Member;
use App\Models\User;

class CompetitionController extends Controller
{
    // Only viewable if logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // Upcoming competitions view
    public function index() {
        $userId = Auth::user()->id;
        $competitions = Competition::where('user_id',$userId)->orderBy('title')->paginate(10);

        return view('competitions.index', [
            'competitions' => $competitions
        ]);
    }

    // Past competitions view
    public function past() {
        return view('competitions.past-competitions');
    }

    // Add a competition view
    public function add() {
        return view('competitions.add-competition');
    }

    // Storing a new competition
        public function store(Request $request)
    {   
        // Validation for new competition
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required|after_or_equal:today',
            'address_1' => 'max:255',
            'address_2' => 'max:255',
            'town_city' => 'max:100',
            'postcode' => 'max:10',
            'notes' => 'max:255'            
        ]);

        // Store competition in the database
        $request->user()->competitions()->create([
            'title' => ucwords(strtolower($request->title)),
            'date' => $request->date,
            'address_1' => ucwords(strtolower($request->address_1)),
            'address_2' => ucwords(strtolower($request->address_2)),
            'town_city' => ucwords(strtolower($request->town_city)),
            'postcode' => strtoupper($request->postcode),
            'notes' => ucfirst($request->notes)    
        ]);

        // Redirect to all competiions and show success message     
        return redirect()->route('competitions')->with('success', 'Competition added');
    }
}
