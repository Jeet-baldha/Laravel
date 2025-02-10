<?php

namespace App\Observers;
use App\Jobs\SendEmailJob;

use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {

        $details = [
            "full_name" => $user->full_name,
            "email" => $user->email
        ];

        SendEmailJob::dispatch($details);

    }

    /**
     * Handle the User "restored" event.    
     */
    public function restored(User $user): void
    {

    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
