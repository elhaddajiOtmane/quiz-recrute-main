<?php

namespace App\Http\Controllers;
use App\Mail\QuizReminder;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
use DB;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::where('role', '=', 'S')->get();
    return view('admin.users.indexx', compact('users'));
  }

  // =================function send email to students=============
  
  public function sendEmail(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'subject' => 'required',
      'message' => 'required',
    ]);

    $data = array(
      'email' => $request->email,
      'subject' => $request->subject,
      'message' => $request->message,
    );

    Mail::to($data['email'])->send(new QuizReminder($data));

    return back()->with('success', 'Thanks for contacting us!');
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
    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'mobile' => 'unique:users',
      'password' => 'required|string|min:6',
    ]);

    $input = $request->all();

    User::create([
      'first_name' => $input['first_name'],
      'last_name' => $input['last_name'],
      'email' => $input['email'],
      'password' => bcrypt($input['password']),
      'mobile' => $input['mobile'],
      'address' => $input['address'],
      'city' => $input['city'],
      'role' => $input['role'],
    ]);

    return back()->with('added', 'User has been added');
  }
  





  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);

    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'mobile' => 'unique:users',
      'password' => 'required|string|min:6',
    ]);

    $input = $request->all();

    // if(isset($request->changepass))
    //    {
    //       DB::table('users')->where('id', $user->id)->update(['password' => Hash::make($request->password)]);
    //    }
    //    else
    //    {
    //      $input['password'] = $user->password;
    //    }

    if (Auth::user()->role == 'A') {
      $user->update([
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'email' => $input['email'],
        'password' => bcrypt($input['password']),
        'mobile' => $input['mobile'],
        'address' => $input['address'],
        'city' => $input['city'],
        'role' => $input['role'],
      ]);
    } else if (Auth::user()->role == 'S') {
      $user->update([
        'first_name' => $input['first_name'],
        'last_name' => $input['last_name'],
        'email' => $input['email'],
        'password' => bcrypt($input['password']),
        'mobile' => $input['mobile'],
        'address' => $input['address'],
        'city' => $input['city'],
      ]);
    }

    return back()->with('updated', 'Student has been updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();
    return back()->with('deleted', 'User has been deleted');
  }




  // ================================================candidate methods===================================================


}
