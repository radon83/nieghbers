<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name_en' => 'book',
                'name_ar' => 'كتاب',
                'description_en' => 'To access data further down the hierarchy, you have to chain the required property names and array indexes together.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 1,
                'fee' => 200,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'pen',
                'name_ar' => 'كتاب',
                'description_en' => 'A useful tool for writing.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 2,
                'fee' => 50,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'notebook',
                'name_ar' => 'كتاب',
                'description_en' => 'A place to jot down your thoughts.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 1,
                'fee' => 100,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'hammer',
                'name_ar' => 'كتاب',
                'description_en' => 'A tool with a heavy metal head mounted at right angles at the end of a handle, used for jobs such as breaking things and driving in nails.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 2,
                'fee' => 75,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'axe',
                'name_ar' => 'كتاب',
                'description_en' => 'A tool that has a heavy metal blade and a long handle and is used for chopping wood.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 1,
                'fee' => 90,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'saw',
                'name_ar' => 'كتاب',
                'description_en' => 'A tool with a long, thin, sharp blade, used for cutting wood or metal.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 1,
                'fee' => 85,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'stroller',
                'name_ar' => 'كتاب',
                'description_en' => 'A small vehicle with four wheels in which a baby or child is pushed around.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 1,
                'fee' => 150,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name_en' => 'drill',
                'name_ar' => 'كتاب',
                'description_en' => 'A tool or machine that makes holes.',
                'description_ar' => 'بيلبب  تلهريبىلنتبايه ىلرتق ىترىبت ىيبتى ينبىمربي',
                'user_id' => 1,
                'category_id' => 1,
                'fee' => 120,
                'city_id' => 1, // Assuming city ID 1 exists
                'place_id' => 1, // Assuming place ID 1 exists
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($items as $item) {
            DB::table('items')->insert([
                'name_en' => $item['name_en'],
                'name_ar' => $item['name_ar'],
                'description_en' => $item['description_en'],
                'description_ar' => $item['description_ar'],
                'user_id' => $item['user_id'],
                'category_id' => $item['category_id'],
                'fee' => $item['fee'],
                'city_id' => $item['city_id'],
                'place_id' => $item['place_id'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ]);
        }
   
    
    }
}
