<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Film::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'details' => $this->faker->paragraph(),
            'image_url' => 'image.jpg',
            'genre' => "Kinh di, Khoa hoc",
            'nation' => "Viet Nam",
            'time' => 120,
            'premiere' => "2021-12-12"
        ];
    }
}
