<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@ecom.uz',
            'phone' => '+99999999',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@gmail.com',
            'phone' => '+9999989998',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('editor');

        $user = User::create([
            'first_name' => 'Alex',
            'last_name' => 'Robert',
            'email' => 'alex@gmail.com',
            'phone' => '+99999389998',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('shop-manager');

        $user = User::create([
            'first_name' => 'Rocky',
            'last_name' => 'Balbao',
            'email' => 'rocky@gmail.com',
            'phone' => '+9567389998',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('helpdesk-support');

        $user = User::create([
            'first_name' => 'Bilol',
            'last_name' => 'Nematov',
            'email' => 'bilol@gmail.com',
            'phone' => '+999998999',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('customer');


        $users = User::factory()->count(10)->create();
        foreach ($users as $user) {
            $user->assignRole('customer');
        }
    }
}
