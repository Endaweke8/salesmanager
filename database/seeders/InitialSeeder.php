<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\RecordType::insert([
            ['name' => 'Daily Sales', 'description' => 'Record of daily sales', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visit', 'description' => 'Customer visit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Call', 'description' => 'Sales call', 'created_at' => now(), 'updated_at' => now()],
        ]);

        \App\Models\Product::insert([
            ['sku' => 'GEN-001', 'name' => 'Generator Model A', 'price' => 12000, 'stock_quantity' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['sku' => 'GEN-002', 'name' => 'Generator Model B', 'price' => 18000, 'stock_quantity' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        \App\Models\Employee::create(['name' => 'Alice Seller', 'phone' => '0911000000', 'email' => 'alice@example.com', 'position' => 'Seller', 'status' => 'active']);
        \App\Models\Employee::create(['name' => 'Bob Seller', 'phone' => '0911000001', 'email' => 'bob@example.com', 'position' => 'Seller', 'status' => 'active']);
    }
}
