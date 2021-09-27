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
        $contact->subject = $request->subject;
        $contact->save();
        $success = "Thank you for your message! We will get back to you as soon as possible";
        return view('frontEnd.views.contact', compact('success'));
    }

    public function show() {
        $contacts = ContactUs::all()->where('ticket_closed', false)->where('action', false);
        return view('Admin.views.Contact.contact_list', compact('contacts'));
    }

    public function showActioned() {
        $contacts = ContactUs::all()->where('ticket_closed', false)->where('action', true);
        return view('Admin.views.Contact.actioned_contact_list', compact('contacts'));
    }

    public function showClosed() {
        $contacts = ContactUs::all()->where('ticket_closed', true);
        return view('Admin.views.Contact.closed_contact_list', compact('contacts'));
    }

    public function setAction(Request $request) {
        $contactUs = ContactUs::find($request->id);
        $contactUs->action_description = $request->get('description');
        $contactUs->action = true;
        $contactUs->save();
        return redirect(route('adminContactUsList'));
    }

    public function setTicketClosed(Request $request) {
        $contactUs = ContactUs::find($request->id);
        $contactUs->ticket_closed = true;
        $contactUs->save();
        return redirect(route('adminContactUsActionedList'));
    }
}
