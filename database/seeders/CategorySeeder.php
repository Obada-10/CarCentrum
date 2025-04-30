<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Remmen',
                'description' => 'Onderdeel voor het vertragen en stoppen van het voertuig.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Oliën',
                'description' => 'Motorolie, transmissieolie, en andere soorten olie voor voertuigen.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Filters',
                'description' => 'Luchtfilters, olie-filters, brandstoffilters, enz.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banden',
                'description' => 'Wielen en banden voor verschillende soorten voertuigen.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Verlichting',
                'description' => 'Lampjes, koplampen, achterlichten, enz.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Accu\'s',
                'description' => 'Batterijen voor voertuigen voor het starten en stroomvoorziening.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Koppelingen',
                'description' => 'Koppelingen voor voertuigen, essentieel voor het schakelen van versnellingen.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
