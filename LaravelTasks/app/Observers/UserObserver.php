<?php

namespace App\Observers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
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
        Mail::to("jeetbaldha56@gmail.com")->queue(new Email($user));

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
