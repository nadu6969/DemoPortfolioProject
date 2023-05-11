<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.contact');
    }

    public function StoreMessage(Request $request)
    {
        Contact::insert([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'phone'   => $request->phone,
            'message' => $request->message,
            'created_at' =>Carbon::now(),
        ]);

        return redirect()->back()->with('message','Your Message Submitted Successfully !');
    }

    public function ContactMessage()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontacts',compact('contacts'));
    }

    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();
        Alert::warning('Messege Deleted Successfully!','We Have Delete Messege');
        return redirect()->back();
    }

}
