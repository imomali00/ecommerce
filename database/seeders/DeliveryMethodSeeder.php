<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Tekin',
                'ru' => 'Бесплатно',
            ],
            'estimated_time' => [
                'uz' => '2 kun',
                'ru' => '2 день',
            ],
            'sum' => 0
        ]);
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Standard',
                'ru' => 'Стандард',
            ],
            'estimated_time' => [
                'uz' => '3 kun',
                'ru' => '3 день',
            ],
            'sum' => 40000
        ]);
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Tez',
                'ru' => 'Бистрей',
            ],
            'estimated_time' => [
                'uz' => '1 kun',
                'ru' => '1 день',
            ],
            'sum' => 100000
        ]);
    }
}
