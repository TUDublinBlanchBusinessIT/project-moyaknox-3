<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloristsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('florists')->insert([
            [
                'name' => 'Breda Knox',
                'email' => 'BredaK@example.com',
                'phone' => '0873102667',
                'address' => '789 Flower Road',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Helan Martin',
                'email' => 'HelanM@gmail.com',
                'phone' => '0893339947',
                'address' => '101 Blossom Blvd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

