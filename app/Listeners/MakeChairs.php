<?php

namespace App\Listeners;

use App\Models\MovieChair;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MakeChairs
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
        for($i=1; $i <= 50; $i= $i+1){
            $coefficient = 1;
            if($i <= 10){
                $coefficient = 1.25;
            }
            else if($i <= 20){
                $coefficient = 1.15;
            }
            if($i % 10 == 0){
                $coefficient += 0.1;
                MovieChair::create([
                    'room_id' => $event->room_id,
                    'location' => $i, 
                    'available' =>true,
                    'double_chair' => true,
                    'coefficient' => $coefficient
                ]);
            }
            else{
                MovieChair::create([
                    'room_id' => $event->room_id,
                    'location' => $i, 
                    'available' =>true,
                    'double_chair' => false,
                    'coefficient' => $coefficient
                ]);
            }
        }
    }
}
