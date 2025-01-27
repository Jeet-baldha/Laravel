<?php

class Newslatter
{

    public function subscribe($email)
    {

        dd($email);
        $mailchimp = new \MailchimpMarketing\ApiClient();


        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us16'
        ]);

        $response = $mailchimp->lists->addListMember('36e50bc2c0', [
            'email_address' => request($email),
            'status' => 'subscribed'
        ]);

        return redirect('/')->with('success', "You are now subscribe our newslatter");


    }

}