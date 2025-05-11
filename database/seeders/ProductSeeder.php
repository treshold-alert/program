<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Kaos Polos Hitam',
            'description' => 'Kaos polos bahan cotton combed 30s',
            'price' => 50000,
            'stock' => 15
        ]);
    }
}
