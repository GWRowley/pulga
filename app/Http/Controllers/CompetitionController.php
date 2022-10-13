<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Academy;
use App\Models\Member;
use App\Models\Competition;

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
        $dateNow = Carbon::now()->format('Y-m-d');
        $competitions = Competition::where('user_id',$userId)->orderBy('date')->where('date', '>=', $dateNow)->paginate(12);
        $hasAcademy = Academy::where('user_id', '=', Auth::user()->id)->exists();
       
        if ($hasAcademy) {
            return view('competitions.index', [
                'competitions' => $competitions,
                'dateNow' => $dateNow
            ]);
         } else {
            return redirect()->route('create-academy')->with('danger', 'You must create an academy first');
        }
    }

    // Past competitions view
    public function past() {
        $userId = Auth::user()->id;
        $dateNow = Carbon::now()->format('Y-m-d');
        $competitions = Competition::where('user_id',$userId)->orderBy('date')->where('date', '<', $dateNow)->paginate(12);

        return view('competitions.past-competitions', [
            'competitions' => $competitions
        ]);
    }

    // View an individual competition
    public function event($id) {
        $competition = Competition::findOrFail($id);
        
        // Show event details if added by you, else redirect
        if ($competition->ownedBy(auth()->user())) {
            return view('competitions.event')->with([
                'competition' => $competition,
            ]);
        } else {
            return redirect()->route('competitions')->with('danger', 'You are not authorised to view this competition');
        }
    }

    // Add a competition view
    public function add() {
        return view('competitions.add-competition');
    }

    // Storing a new competition
    public function store(Request $request) {   
        // Validation for new competition
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required',
            'address_1' => 'required|max:255',
            'address_2' => 'max:255',
            'town_city' => 'required|max:100',
            'postcode' => 'required|max:10'
        ]);

        // Store competition in the database
        $request->user()->competitions()->create([
            'title' => ucwords(strtolower($request->title)),
            'date' => $request->date,
            'information' => ucfirst($request->information),
            'address_1' => ucwords(strtolower($request->address_1)),
            'address_2' => ucwords(strtolower($request->address_2)),
            'town_city' => ucwords(strtolower($request->town_city)),
            'postcode' => strtoupper($request->postcode) 
        ]);

        // Redirect to all competiions and show success message     
        return redirect()->route('competitions')->with('success', 'Competition added');
    }

    // Edit competition view
    public function edit($id) {
        $competition = Competition::findOrFail($id);

        // Edit competition if it's yours, else redirect
        if ($competition->ownedBy(auth()->user())) {
            return view('competitions.edit-event')->with([
                'competition' => $competition
            ]);
        } else {
            return redirect()->route('competitions')->with('danger', 'You are not authorised to edit this competition');
        }
    }

    // Edit and update competition
    public function update(Request $request, $id) {

        // Validation for updating competition
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required',
            'address_1' => 'required|max:255',
            'address_2' => 'max:255',
            'town_city' => 'required|max:100',
            'postcode' => 'required|max:10'
        ]); 

        // Updating the competition
        $competition = Competition::findOrFail($id);

        $competition->title = ucwords(strtolower($request->title));
        $competition->date = $request->date;
        $competition->information = ucfirst($request->information);
        $competition->address_1 = ucwords(strtolower($request->address_1));
        $competition->address_2 = ucwords(strtolower($request->address_2));
        $competition->town_city = ucwords(strtolower($request->town_city));
        $competition->postcode = strtoupper($request->postcode);

        $competition->update();

        // Redirect and show success message     
        return redirect('/competitions/event/' . $id)->with('success', 'Competition updated');
    }

    // Delete competition
    public function delete($id) {
        $competition = Competition::findOrFail($id);

        if ($competition->ownedBy(auth()->user())) {
            // Delete competition if it's one of yours
            $competition->delete();     
        
            // Redirect to all competitions and show success message     
            return redirect()->route('competitions')->with('success', 'Competition deleted');
        } else {
            return redirect()->route('competitions')->with('danger', 'You are not authorised to delete this competition');
        }
    }
}
