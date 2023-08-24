<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\User;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = User::where('role', '=', 'C')->get();
        return view('admin.candidates.indexx', ['candidates' => $candidates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
     public function store(Request $request)
     {
         // Validate the request data, including file uploads
         $validatedData = $request->validate([
             'first_name' => 'required|string|max:255',
             'last_name' => 'required|string|max:255',
             'date_of_birth' => 'required|date',
             'desired_position' => 'required|string|max:255',
             'CV' => 'required|file|mimes:pdf,doc,docx', // Define your file validation rules
             'city' => 'required|string|max:255',
             'cover_letter' => 'required|file|mimes:pdf,doc,docx', // Define your file validation rules
             'comments' => 'nullable|string|max:1000',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:8',
             'mobile' => 'required|string|max:20',
         ]);

        
     
         // Handle file uploads (CV and cover letter)
         $cvPath = $request->file('CV')->store('public/cv'); // Store in the 'public/cv' directory
         $coverLetterPath = $request->file('cover_letter')->store('public/cover_letters'); // Store in the 'public/cover_letters' directory

         $cvPath = str_replace('public/', '', $cvPath);
         $coverLetterPath = str_replace('public/', '', $coverLetterPath);
     
         // Create a new user record with the file paths
         $user = User::create([
             'first_name' => $validatedData['first_name'],
             'last_name' => $validatedData['last_name'],
             'date_of_birth' => $validatedData['date_of_birth'],
             'desired_position' => $validatedData['desired_position'],
             'CV' => $cvPath,
             'city' => $validatedData['city'],
             'cover_letter' => $coverLetterPath,
             'comments' => $validatedData['comments'],
             'email' => $validatedData['email'],
             'role' => 'C',
             'password' => bcrypt($validatedData['password']),
             'mobile' => $validatedData['mobile'],
         ]);
     
         // Check if user was created successfully
         if ($user) {
             // Return a JSON response indicating success and the new user's data
             return response()->json(['message' => 'User has been added', 'user' => $user], 201);
         } else {
             // Handle the case where user creation failed
             return response()->json(['message' => 'User creation failed'], 500);
         }
     }
     

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    // Function To Update Candidate  celected list to Students usign foreach loop
    public function updateCandidate(Request $request)
    {
      // turn candidate to student from that reqest function turntostudent() {
      $ids = $request->ids;
      foreach ($ids as $id) {
        $user = User::findOrFail($id);
        $user->role = 'S';
        $user->save();
      }
      return response()->json(['success' => "Candidates turned to students successfully."]);
    }
      



}
