<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BouquetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bouquets')->insert([
            [
                'name' => 'Spring Bouquet',
                'price' => 29.99,
                'description' => 'A lovely mix of spring flowers.',
                'florist_id' => 1, // Assuming this florist exists in your florists table
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elegant Bouquet',
                'price' => 49.99,
                'description' => 'Elegant arrangement of premium blooms.',
                'florist_id' => 2, // Adjust accordingly
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

