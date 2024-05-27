<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Nayla Shafa Sybilla',
            'email' => 'nayla@wesel.my.id',
            'email_verified_at' => now(),
            'password' => Hash::make('Yr&a[E8?c6Pz+Fux5sCp'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
