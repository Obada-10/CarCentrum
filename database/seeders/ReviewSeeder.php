<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Specifieke reviews invoegen
        Review::insert([
            [
                'user_id' => 1,  // Gebruiker 1
                'product_id' => 1,  // Product 1
                'rating' => 5,  // Beoordeling 5
                'comment' => 'Uitstekend product! Heel tevreden mee.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,  // Gebruiker 2
                'product_id' => 2,  // Product 2
                'rating' => 4,  // Beoordeling 4
                'comment' => 'Goed product, maar had sneller geleverd kunnen worden.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,  // Gebruiker 3
                'product_id' => 3,  // Product 3
                'rating' => 3,  // Beoordeling 3
                'comment' => 'Het product is oké, maar er zijn betere alternatieven.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);

    }
}
