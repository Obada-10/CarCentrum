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
        // Lijst van auto-onderdelen merken
        $brands = [
            'Bosch',
            'Magneti Marelli',
            'Valeo',
            'Sachs',
            'NGK',
            'Brembo',
            'Lucas',
            'TRW',
            'Denso',
            'KYB',
            'Mahle',
            'Hella',
            'Mann-Filter',
            'Carter',
            'Delphi',
            'Behr',
            'Febi Bilstein',
            'Eberspächer',
            'ZF Friedrichshafen',
            'Contitech',
        ];

        // Voeg de merken toe aan de database
        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
            ]);
        }
    }
}
