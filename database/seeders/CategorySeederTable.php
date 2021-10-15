<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Siêu nhiên', 'Lãng mạn', 'Hành động', 'Khoa học', 'Sử thi', 'Kinh dị'];
        for($i =0; $i<count($names); $i++){
            Category::factory()->count(1)
            ->state([
                'name' => $names[$i],
                'slug' =>Str::slug($names[$i]),
            ])
            ->create();
        }
    }
}
