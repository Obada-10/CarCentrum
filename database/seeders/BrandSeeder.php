<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lijst van auto-onderdelen merken met afbeeldingen
        $brands = [
            [
                'name' => 'Bosch',
                'image' => 'https://mitechnews.com/wp-content/uploads/2024/07/Bosch-Emblem-2232597153.png'
            ],
            [
                'name' => 'Magneti Marelli',
                'image' => 'https://i.pinimg.com/736x/4d/89/24/4d89246db7b99a981604384d5f3d2b33.jpg'
            ],
            [
                'name' => 'Valeo',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Valeo_Logo.svg/1280px-Valeo_Logo.svg.png'
            ],
            [
                'name' => 'Sachs',
                'image' => 'https://www.sachsperformance.com/blog/image/nieuw-logo-sachs-performance.jpg'
            ],
            [
                'name' => 'NGK',
                'image' => 'https://gngtraders.co.nz/cdn/shop/products/ngk_logo_7_SDPRNEU92OUE_610c0901-9e42-4f88-b703-98d8aecce5af_grande.jpg?v=1613000607'
            ],
            [
                'name' => 'Brembo',
                'image' => 'https://brem-p-001.sitecorecontenthub.cloud/api/public/content/b9af55d22cae4c9ab27047506584bb98?v=4e813e40'
            ],
            [
                'name' => 'Lucas',
                'image' => 'https://seeklogo.com/images/L/Lucas-logo-A7BA932B4C-seeklogo.com.png'
            ],
        ];

        // Voeg de merken toe aan de database
        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
