<?php

namespace Avalon\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Avalon\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Validator;
use Avalon\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    //
    public function index() {
        return view('contact::contact');
    }

    public function send(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|max:100'
        ]);

        if($validator->fails()) {

            $msg = $validator->errors();
            return view('contact::contact')->with([
                'validationErrors' => $msg,
                'input' => $request->input()]);
            // return redirect()->route('contact')->with($msg);
        }

        try {
            Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
            Contact::create($request->all());
        } catch (Throwable $e) {
            return view('contact::contact')->with(['error' => 'Mail sending failed because of '.$e->getMessage()]);
        }

        return view('contact::contact')->with(['status' => 'Mail sent successfully']);
    }
}
