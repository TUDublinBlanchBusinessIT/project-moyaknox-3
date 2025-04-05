<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'customer_id' => 1, // Assuming this customer exists
                'bouquet_id' => 1,  // Assuming this bouquet exists
                'order_date' => now()->format('Y-m-d'),
                'special_requests' => 'Please deliver before noon.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'bouquet_id' => 2,
                'order_date' => now()->format('Y-m-d'),
                'special_requests' => 'Gift wrap it.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
