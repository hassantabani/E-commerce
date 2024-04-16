<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "password"=>"12345678",
            "role"=>"Admin",
            "status"=>"Active",
        ]);
    }
}
