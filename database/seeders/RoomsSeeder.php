<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Room\Room;
use App\Models\Room\RoomType;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfTypes = 3;
        $numberOfRooms = 10;
        

        RoomType::factory()
                ->count($numberOfTypes)
                ->state(new Sequence(
                    ['name' => 'VIP'],
                    ['name' => 'NORMAL'],
                    ['name' => '3D']
                ))
                ->create();

        Room::factory()
                ->count($numberOfRooms)
                ->state(new Sequence(
                    fn ($sequence) => ['type_id' => RoomType::all()->random()],
                ))
                ->create();
    }
}
