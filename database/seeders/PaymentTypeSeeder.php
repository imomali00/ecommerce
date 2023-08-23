<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentType::create([
            'name' => [
                'uz' => 'Naxt',
                'ru' => 'ru Naxt',
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Terminal',
                'ru' => 'Терминал',
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Pay me',
                'ru' => 'Pay me',
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Click',
                'ru' => 'Click',
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Uzum',
                'ru' => 'Uzum',
            ]
        ]);
    }
}
