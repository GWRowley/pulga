<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\User;

class MemberController extends Controller
{
    // Only viewable if logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // All members view
    public function index() {
        $members = Member::orderBy('name')->orderBy('surname')->paginate(10);
        
        return view('members.index', [
            'members' => $members
        ]);
    }

    // View single member profile
    public function show($id) {
        $member = Member::findOrFail($id);
        $age = Carbon::parse($member->dob)->diff(Carbon::now())->y;
        
        // Show member profile if they are one of your members, else redirect
        if ($member->ownedBy(auth()->user())) {
            return view('members.member-profile')->with([
                'member' => $member,
                'age' => $age        
            ]);
        } else {
            return redirect()->route('members')->with('danger', 'You are not authorised to view this member');
        }
        
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
            'member_since' => 'required|before_or_equal:today',
            'emergency_contact' => 'required|max:255',
            'emergency_number' => 'required|max:20',
            'medical_information' => 'max:255'            
        ]);

        // Store member in the database
        $request->user()->members()->create([
            'name' => $request->name,
            'surname' => $request->surname,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'belt' => $request->belt,
            'membership' => $request->membership,
            'member_since' => $request->member_since,
            'emergency_contact' => $request->emergency_contact,
            'emergency_number' => $request->emergency_number,
            'medical_information' => $request->medical_information    
        ]);

        // Redirect to all members and show success message     
        return redirect()->route('members')->with('success', 'Member added');
    }

    // Edit member view
    public function edit($id) {
        $member = Member::findOrFail($id);

        // Edit member profile if they are one of your members, else redirect
        if ($member->ownedBy(auth()->user())) {
            return view('members.edit-member')->with([
                'member' => $member
            ]);
        } else {
            return redirect()->route('members')->with('danger', 'You are not authorised to edit this member');
        }

    }

    // Edit and update member
    public function update(Request $request, $id) {

        // Validation for updating member
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'dob' => 'required|before_or_equal:today',
            'gender' => 'required|max:6',
            'belt' => 'required|max:6',
            'membership' => 'required|max:255',
            'member_since' => 'required|before_or_equal:today',
            'emergency_contact' => 'required|max:255',
            'emergency_number' => 'required|max:20',
            'medical_information' => 'max:255'
        ]);

        // Updating the member record
        $member = Member::findOrFail($id);

        $member->name = $request->name;
        $member->surname = $request->surname;
        $member->dob = $request->dob;
        $member->gender = $request->gender;
        $member->belt = $request->belt;
        $member->membership = $request->membership;
        $member->member_since = $request->member_since;
        $member->emergency_contact = $request->emergency_contact;
        $member->emergency_number = $request->emergency_number;
        $member->medical_information = $request->medical_information;

        $member->update();

        // Redirect and show success message     
        return redirect('/members/profile/' . $id)->with('success', 'Member updated');
    }

    // Delete member
    public function delete($id) {
        $member = Member::findOrFail($id);

        // Delete member if they are one of your members, else redirect
        if ($member->ownedBy(auth()->user())) {
            $member->delete();     

            // Redirect to all members and show success message     
            return redirect()->route('members')->with('success', 'Member deleted');
        } else {
            return redirect()->route('members')->with('danger', 'You are not authorised to delete this member');
        }
        
    }
}
