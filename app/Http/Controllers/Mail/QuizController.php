<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Mail\QuizReminder;
use Illuminate\Support\Facades\Mail;


class QuizController extends Controller
{
    public function sendEmail()
    {
        Mail::to('alinniwa7@gmail.com')->send(new QuizReminder());
        // additional logic here
    }
}
