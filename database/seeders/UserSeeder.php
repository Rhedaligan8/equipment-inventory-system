<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::whereUsername("icteiis-admin")->exists()) {
            User::create([
                'username' => 'icteiis-admin',
                'password' => Hash::make('password'),
                'status' => 1,
                'role' => 1,
            ]);
            $this->command->info('Admin user created.');
        } else {
            $this->command->info('Admin user already exists. Skipping creation.');
        }
    }
}
