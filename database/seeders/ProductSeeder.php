<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Specifieke producten invoegen
        Product::insert([
            [
                'name' => 'Bosch Remblokken',
                'description' => 'Hoge kwaliteit remblokken van Bosch voor voertuigen.',
                'price' => 49.99,
                'stock' => 150,
                'image_path' => 'images/products/bosch_remblokken.jpg',
                'category_id' => Category::where('name', 'Remmen')->first()->id,  // Aannemen dat 'Remmen' een categorie is
                'brand_id' => Brand::where('name', 'Bosch')->first()->id,  // Aannemen dat 'Bosch' een merk is
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valeo Distributieriem',
                'description' => 'Betrouwbare distributieriem van Valeo voor voertuigen.',
                'price' => 89.99,
                'stock' => 120,
                'image_path' => 'images/products/valeo_distributieriem.jpg',
                'category_id' => Category::where('name', 'Koppelingen')->first()->id,  // Aannemen dat 'Motoronderdelen' een categorie is
                'brand_id' => Brand::where('name', 'Valeo')->first()->id,  // Aannemen dat 'Valeo' een merk is
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'NGK Bougies',
                'description' => 'Hoge kwaliteit bougies van NGK voor diverse voertuigen.',
                'price' => 19.99,
                'stock' => 200,
                'image_path' => 'images/products/ngk_bougies.jpg',
                'category_id' => Category::where('name', 'Verlichting')->first()->id,  // Aannemen dat 'Elektrisch' een categorie is
                'brand_id' => Brand::where('name', 'NGK')->first()->id,  // Aannemen dat 'NGK' een merk is
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
