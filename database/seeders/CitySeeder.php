<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name_en' => 'Riyadh', 'name_ar' => 'الرياض'],
            ['name_en' => 'Jeddah', 'name_ar' => 'جدة'],
            ['name_en' => 'Makkah', 'name_ar' => 'مكة'],
            ['name_en' => 'Medina', 'name_ar' => 'المدينة'],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'name_en' => $city['name_en'],
                'name_ar' => $city['name_ar'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
