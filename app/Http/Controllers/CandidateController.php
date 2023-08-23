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
       // $input = $request->all();
   
       $name = $request['first_name'] . ' ' . $request['last_name'];
       $user = User::create([
         'first_name' => $request['first_name'],
         'last_name' => $request['last_name'],
         'date_of_birth' => $request['date_of_birth'],
         'desired_position' => $request['desired_position'],
         'CV' => $request['CV'],
         'city' => $request['city'],
         'cover_letter' => $request['cover_letter'],
         'comments' => $request['comments'],
         'email' => $request['email'],
         'role' => 'C',
         'password' => bcrypt($request['password']),
         'mobile' => $request['mobile'],
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
