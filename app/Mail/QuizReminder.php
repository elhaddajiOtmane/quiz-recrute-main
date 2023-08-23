<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuizReminder extends Mailable
{
    use Queueable, SerializesModels;

// protected $email ;
// protected $subject;
// protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($email, $subject, $message)
    // {
    //   $this->email = $email;
    //   $this->subject = $subject;
    //   $this->message = $message;
    // }
    public function __construct()
    {
    
    }

    // public function build()
    // {
    //     return $this->view('email.quiz')->subject('Quiz Reminder');
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.quiz');
        
    }


}
