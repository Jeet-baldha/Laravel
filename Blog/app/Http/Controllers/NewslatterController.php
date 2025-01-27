<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewslatterController extends Controller
{
    public function __invoke()
    {
        request()->validate([
            'email' => "required|email"
        ]);

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us16'
        ]);

        try {
            $response = $mailchimp->lists->addListMember('36e50bc2c0', [
                'email_address' => request('email'),
                'status' => 'subscribed'
            ]);
            return redirect('/')->with('success', "You are now subscribe our newslatter");
        } catch (\Throwable $th) {
            throw ValidationException::withMessages(['email' => "This email could not add in our newslatter list"]);
        }
    }
}
