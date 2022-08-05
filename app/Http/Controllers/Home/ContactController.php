<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('frontend.pages.contactPage');
    }
    public function StoreMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ],[
            'name.required'=>'Your name is required',
            'email.required'=>'Your Email is required',
            'subject.required'=>'Your Subject Matter is Important',
            'phone.required'=>'phone number is required',
            'message.required'=>'Message is important',


        ]);

        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'phone'=>$request->phone,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->back()->with('info','Thank you, Your message has been well received');



    }

    public function ContactMessage()
    {
        $all_messages = Contact::latest()->get();
        return view('admin.contact.all_messages',compact('all_messages'));
    }

    public function ViewModal()
    {
     return view('admin.contact.message_modal');
    }
    public function DeleteMessage($id)
    {
     Contact::FindOrFail($id)->Delete();
     return redirect()->back()->with('info','Message successfully deleted');

    }
}
