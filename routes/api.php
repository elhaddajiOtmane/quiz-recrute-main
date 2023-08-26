<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\QuizReminder;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\QuizController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::controller for CandidateControllerand for method only post

Route::post('candidate', 'CandidateController@store');

$user = [
    'email' => 'alinniwa7@gmail.com', // Replace with the actual email address
    // Other user data...
];

// Route::controller for usercontroller for method only post
// Route::post('email',function(){
//     Mail::to('alinniwa7@gmail.com')->send(new QuizReminder());
// });


Route::post('eamil', 'app\Http\Controllers\Mail\QuizController@sendEmail');

