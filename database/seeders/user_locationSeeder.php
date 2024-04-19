<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UserLocation;

class user_locationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        DB::table('user_locations')->insert([
            'country' => 'Saudi Arabia',
            'city' => 'Makkah',
            'lat' => '21.420000000000000',
            'long' => '39.820000000000000',
            'user_id' => '1',
            'created_at' => '2024-04-08 08:59:40',
        ]);
    }
}
