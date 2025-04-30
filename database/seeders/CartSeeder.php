<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;

class CartSeeder extends Seeder
{
    public function run()
    {
        // Specifieke winkelwagentjes invoegen
        Cart::insert([
            [
                'user_id' => 1,  
                'product_id' => 1,  
                'quantity' => 2,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,  
                'product_id' => 2,  
                'quantity' => 1,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,  
                'product_id' => 3,  
                'quantity' => 3,  
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
