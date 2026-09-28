<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function email($id)
    {

        $email = Customer::find($id);
        $mail = $email->user->email;
        $details = [
            'title' => 'Email from Victoria Elite',
            'body' => 'This Email is from Victoria Elite Painting ,
        How can i help you?',
        ];

        Mail::to($mail)->send(new SendMail($details));

        return back()->with('Email-sent', 'Email has been sent successfully!!!');
    }
}
