<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        return [
            'name' => $faker->sentence(mt_rand(1, 3)),
            'author' => $faker->name(),
            'publisher' => $faker->company(),
            'release' => mt_rand(1945, 2023),
            'description' => $faker->text(),
        ];
    }
}
