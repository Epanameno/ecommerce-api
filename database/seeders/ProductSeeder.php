<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop HP',
            'description' => 'Core i7',
            'price' => 999,
            'stock' => 20
        ]);
    }
}
