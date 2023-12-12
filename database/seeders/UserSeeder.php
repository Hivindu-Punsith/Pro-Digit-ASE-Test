<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('12345678')],
            // Add more users as needed
        ];

        foreach ($users as $key => $user) {

            $userCheck = User::where('email', $user['email'])->first();

            if (!$userCheck) {
                User::create($user);
            }
        }
    }
}
