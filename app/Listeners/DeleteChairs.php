<?php

namespace App\Listeners;

use App\Models\Movie;
use App\Models\MovieChair;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteChairs
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
        $chairs = MovieChair::where('room_id','=', $event->room_id)->get();
        foreach($chairs as $chair){
            $chair->delete();
        }
    }
}
