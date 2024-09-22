<?php

namespace Database\Seeders;

use App\Models\Accounts\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@mail.com',
            'contact_number' => '09112223344',
            'password' => Hash::make('password'),
        ]);

        User::factory(30)->create();
    }
}
