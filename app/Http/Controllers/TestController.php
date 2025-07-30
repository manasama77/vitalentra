<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index()
    {
        $email_to = 'adam.pm77@gmail.com';
        $subject = 'Test Email';
        $message = 'This is a test email.';

        Mail::raw($message, function ($mail) use ($email_to, $subject) {
            $mail->to($email_to)->subject($subject);
        });

        return response()->json(['status' => 'Email sent']);
    }
}
