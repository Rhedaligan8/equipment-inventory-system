<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;

class LogSeeder extends Seeder
{
    public function run()
    {
        Log::factory()->count(20000)->create(); // Creates 50 logs
    }
}
