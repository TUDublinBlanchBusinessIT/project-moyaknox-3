<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Conor Whelan',
                'email' => 'Conor@gmail.com.com',
                'phone' => '089293848',
                'address' => '123 Main Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@gmail.com', 
                'phone' => '0876543221',
                'address' => '456 Elm Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

