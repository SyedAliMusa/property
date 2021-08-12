<?php

namespace App\Http\Controllers\backEnd\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactMessage(Request $request) {
        $contact = new ContactUs();

        $contact->name = $request->contact_name;
        $contact->email = $request->contact_email;
        $contact->message = $request->contact_message;
        $contact->save();
        $success = "Thank you for your message! We will get back to you as soon as possible";
        return view('frontEnd.views.contact', compact('success'));
    }
}
