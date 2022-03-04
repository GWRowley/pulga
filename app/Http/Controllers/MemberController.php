<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $age = Carbon::parse($member->dob)->diff(Carbon::now())->y;

        return view('members.member-profile')->with([
            'member' => $member,
            'age' => $age
        ]);
    }

    // Add members view
    public function add() {
        return view('members.add-member');
    }

    // Storing a new member
    public function store(Request $request)
    {   
        // Validation for new member
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'dob' => 'required|before_or_equal:today',
            'gender' => 'required|max:6',
            'belt' => 'required|max:6',
            'membership' => 'required|max:255',
            'memberSince' => 'required|before_or_equal:today',
            'emergencyContact' => 'required|max:255',
            'emergencyNumber' => 'required|max:20',
            'medicalInformation' => 'max:255'
        ]);

        // Store member in the database
        Member::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'belt' => $request->belt,
            'membership' => $request->membership,
            'memberSince' => $request->memberSince,
            'emergencyContact' => $request->emergencyContact,
            'emergencyNumber' => $request->emergencyNumber,
            'medicalInformation' => $request->medicalInformation
        ]);

        // Redirect to all members and show success message     
        return redirect()->route('members')->with('success', 'Member added');
    }

    // Edit member view
    public function edit($id) {
        $member = Member::findOrFail($id);
        
        return view('members.edit-member')->with([
            'member' => $member
        ]);
    }

    // Update member
    public function update(Request $request, $id) {

        // Validation for new member
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'dob' => 'required|before_or_equal:today',
            'gender' => 'required|max:6',
            'belt' => 'required|max:6',
            'membership' => 'required|max:255',
            'memberSince' => 'required|before_or_equal:today',
            'emergencyContact' => 'required|max:255',
            'emergencyNumber' => 'required|max:20',
            'medicalInformation' => 'max:255'
        ]);

        $member = Member::findOrFail($id);

        $member->name = $request->input('name');
        $member->surname = $request->input('surname');
        $member->dob = $request->input('dob');
        $member->gender = $request->input('gender');
        $member->belt = $request->input('belt');
        $member->membership = $request->input('membership');
        $member->memberSince = $request->input('memberSince');
        $member->emergencyContact = $request->input('emergencyContact');
        $member->emergencyNumber = $request->input('emergencyNumber');
        $member->medicalInformation = $request->input('medicalInformation');

        $member->update();

        // Redirect and show success message     
        return redirect('/members/profile/' . $id)->with('success', 'Member updated');
    }
}
