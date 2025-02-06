<?php

namespace App\Jobs;

use App\Mail\Email;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Mail;

class SendMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    protected User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('jeetbaldha56@gmail.com')->send(new Email($this->user));
    }
}
