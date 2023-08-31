<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::find(1)->addresses()->create([
            "latitude" => "45.310014",
            "longitude" => "99.280742",
            "region" => "Toshkent",
            "district" => "Yashnaobod",
            "street" => "Fargona yoli 27/2",
            "home" => "29"
        ]);
        User::find(1)->addresses()->create([
            "latitude" => "45.310014",
            "longitude" => "99.280742",
            "region" => "Toshkent",
            "district" => "Mirobod",
            "street" => "Fargona yoli 27/1",
            "home" => "20"
        ]);
    }
}
