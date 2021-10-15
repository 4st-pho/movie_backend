<?php

namespace App\Listeners;

use App\Http\Controllers\MovieChairController;
use App\Models\MovieChair;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateChair
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $chair = MovieChair::findOrFail($event->chair_id);
        if($chair ->available){
            $chair->available = false;
            $chair->save();
        }
        else {
            $chair->available = true;
            $chair->save();
        }
    }
}
