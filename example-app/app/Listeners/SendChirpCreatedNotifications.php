<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use App\Notifications\NewChirp;

use Illuminate\Support\Facades\Log;

class SendChirpCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ChirpCreated $event): void
    {
        //
        foreach(User::whereNot('id',$event->chirp->user_id)->curosr() as $user){
            $user->notify(new NewChirp($event->chirp));
        }

        Log::info("This log is from SendChirpCreatedNotifications");
    }
}
