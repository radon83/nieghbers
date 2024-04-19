<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = [
            ['name_en' => 'Al-Malaz', 'name_ar' => 'الملز', 'city_id' => 1], // Riyadh
            ['name_en' => 'Al-Sulimaniyah', 'name_ar' => 'السليمانية', 'city_id' => 1], // Riyadh
            ['name_en' => 'Al-Hamra', 'name_ar' => 'الحمراء', 'city_id' => 2], // Jeddah
            ['name_en' => 'Al-Safa', 'name_ar' => 'الصفا', 'city_id' => 2], // Jeddah
            ['name_en' => 'Al-Adl', 'name_ar' => 'العدل', 'city_id' => 3], // Mecca
            ['name_en' => 'Al-Nuzha', 'name_ar' => 'النزهة', 'city_id' => 4], // Medina
      
        ];

        foreach ($places as $place) {
            DB::table('places')->insert([
                'name_en' => $place['name_en'],
                'name_ar' => $place['name_ar'],
                'city_id' => $place['city_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
