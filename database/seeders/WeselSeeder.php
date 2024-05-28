<?php

namespace Database\Seeders;

use App\Models\Wesel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeselSeeder extends Seeder
{
    public function run(): void
    {
        Wesel::create([
            'area' => 'Machine 1',
        ]);

        Wesel::create([
            'area' => 'Machine 2',
        ]);
    }
}
