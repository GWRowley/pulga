<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class MemberController extends Controller
{
    // Only viewable if logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // All members view
    public function index() {
        $members = Member::select('id', 'name', 'surname')->get();
        // Show members in alphabetical order
        $members = DB::table('members')
                ->orderBy('name', 'asc')
                ->orderBy('surname', 'asc')
                ->get();
        
        return view('members.index')->with([
            'members' => $members
        ]);
    }

    // View single member profile
    public function show($id) {
        $member = Member::findOrFail($id);

        return view('members.member-profile')->with([
            'member' => $member
        ]);
    }

    // Add members view
    public function add() {

        return view('members.add-member');
    }

    // Storing a new member
    public function store(Request $request) {
        // Validate form submission
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255'
        ]);
        
        try {
            // Save member data
            DB::beginTransaction();
             $add_member = Member::create([
            'name' => $request->name,
            'surname' => $request->surname
        ]);
        
        // If unsuccessful show error message
        if(!$add_member){
            DB::rollBack();
            return back()->with('danger', 'Something went wrong whilst adding new member');
        }

        // If successful, redirect to all members and show success banner
        DB::commit();
        return redirect()->route('members')->with('success', 'New member added');

        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
