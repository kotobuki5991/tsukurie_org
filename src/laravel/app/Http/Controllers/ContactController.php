<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{



    public function send(ContactFormRequest $request)
    {
        // $contact = $request->all();
        $contact = [
            'contact_title' => $request->contact_title,
            'contact_message' => $request->contact_message,
        ];

        \Mail::to(env('MAIL_ADMIN'))->send(new ContactSendmail($contact));
        $request->session()->regenerateToken();
        return view('main/thanks');
    }

    // public function thanks(Request $request)
    // {
    //     return view('main/thanks');
    // }
}
