<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    public function getContactUs(){
        $data['page'] = 'contact_us';
        return view('users.contact_us')->with($data);
    }

    public function contactMail(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // dd($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'msg' => $request->message
        ];
        // dd($data['message']);
        Mail::send('emails.contact', $data, function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->sender($request->email, $request->name);
            $message->to('ablaze.dip@gmail.com', 'hrbdjobs');
            $message->subject($request->subject);
        });

        return redirect()->back()->with('status', 'Thank You! Your mail successfully send.');

        // Mail::send('Html.view', $data, function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to('john@johndoe.com', 'John Doe');
        //     $message->cc('john@johndoe.com', 'John Doe');
        //     $message->bcc('john@johndoe.com', 'John Doe');
        //     $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Subject');
        //     $message->priority(3);
        //     $message->attach('pathToFile');
        // });
    }
}
