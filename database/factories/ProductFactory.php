<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $faker = Faker::create('ru_RU');
        return [
            'category_id' => rand(1,5),
            'name' => [
                'uz' => fake()->sentence(3),
                'ru' => $faker->sentence(3),
            ],
            'price' => rand(50000, 1000000),
            'description' => [
                'uz' =>  fake()->text(150),
                'ru' =>  $faker->text(150),
            ]
        ];
    }
}
