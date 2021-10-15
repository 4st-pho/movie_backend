<?php

namespace Database\Seeders;

use App\Models\Ads;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paths = 'test_path';
        $limit = 10;
        for($i = 0; $i < $limit; $i++){
            Ads::factory()->count(1)
            ->state([
                'adv_image_path' => $paths.$i,
            ])
            ->create();
        }
    }
}
