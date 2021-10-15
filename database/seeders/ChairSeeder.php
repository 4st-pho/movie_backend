<?php

namespace Database\Seeders;

use App\Models\MovieChair;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($room_id = 1; $room_id <= 10 ; $room_id++){
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
                        'room_id' => $room_id,
                        'location' => $i, 
                        'available' =>true,
                        'double_chair' => true,
                        'coefficient' => $coefficient
                    ]);
                }
                else{
                    MovieChair::create([
                        'room_id' => $room_id,
                        'location' => $i, 
                        'available' =>true,
                        'double_chair' => false,
                        'coefficient' => $coefficient
                    ]);
                }
            }
        }
    }
}
