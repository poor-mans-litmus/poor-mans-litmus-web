<?php

namespace App\Http\Controllers;

use App\Events\MailSent;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function create(Request $request)
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate(['body' => 'required']);

        $id = Str::uuid();

        Mail::send([], [], function (Message $message) use ($request, $id) {
            $message->to(config('pml.emails'))
                ->subject($id)
                ->setBody($request->input('body'), 'text/html')
                ->setSender(config('mail.from.address'));
        });

        broadcast(new MailSent(config('pml.emails'), $id));

        return redirect()->back()->withInput();
    }
}
