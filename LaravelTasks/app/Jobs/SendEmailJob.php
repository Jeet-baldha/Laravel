<?php

namespace App\Jobs;

use App\Mail\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable, Dispatchable;

    /**
     * Create a new job instance.
     */

    protected $details;

    public function __construct($details)
    {

        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to('jeetbaldha56@gmail.com')->send(new Email($this->details));
    }
}
