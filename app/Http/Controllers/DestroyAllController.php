<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Answer;

class DestroyAllController extends Controller
{
    public function AllUsersDestroy()
    {
      User::where('role', '=', 'S')->getQuery()->delete();
      // User::where('role', '!=', 'A')->truncate();
      return back()->with('deleted', 'All Student Has Been Deleted');
    }

    public function AllAnswersDestroy() {
      Answer::truncate();
      return back()->with('deleted', 'All Answer Sheets Has Been Deleted');
    }

    public function AllCandidatesDestroy()
    {
        // Find all users with role 'c'
        $usersWithRoleC = User::where('role', 'c')->get();
    
        // Loop through and delete each user
        foreach ($usersWithRoleC as $user) {
            $user->delete();
        }
    
        // Redirect back with a message
        return back()->with('deleted', 'All users with role "c" have been deleted');
    }
    

}
