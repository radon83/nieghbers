<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                "name_en" => "Books",
                "name_ar" => "كتب",
                'category_slug' => Str::slug('Books', '-'),
                "description" => "A collection of pages that are bound together and printed with text or pictures.",
                "image" => "1.png",
                "created_at" => Carbon::now(),
             
            ],
            [
                "name_en" => "Tools",
                'category_slug' => Str::slug('Tools', '-'),
                "name_ar" => "الادوات",
                "description" => "Devices that can be used to produce or achieve something, but do not get used up in the process.",
                "image" => "2.png",
                "created_at" => Carbon::now(),
                
            ],
            [
                "name_en" => "Baby Products",
                'category_slug' => Str::slug('Baby Products', '-'),
                "name_ar" => "منتجات بيبي",
                "description" => "Items designed to be used for infants and young children.",
                "image" => "3.png",
                "created_at" => Carbon::now(),
               
            ],
            [
                "name_en" => "Kitchenware",
                'category_slug' => Str::slug('Kitchenware', '-'),
                "name_ar" => "ادوات مطبخ",
                "description" => "Tools, utensils, appliances, dishes, and cookware used in food preparation or serving.",
                "image" => "4.png",
                "created_at" => Carbon::now(),
              
            ],
            [
                "name_en" => "Furniture",
                'category_slug' => Str::slug('Furniture', '-'),
                "name_ar" => "اثاث",
                "description" => "Items that can be used to support various human activities such as seating, eating, and sleeping.",
                "image" => "default.png",
                "created_at" => Carbon::now(),
                
            ],
            [
                "name_en" => "Home Appliances",
                'category_slug' => Str::slug('Home Appliances', '-'),
                "name_ar" => "ملحقات منزلية",
                "description" => "Electrical/mechanical machines which accomplish household functions, such as cooking or cleaning.",
                "image" => "5.png",
                "created_at" => Carbon::now(),
          
            ],
            [
                "name_en" => "Home Decor",
                'category_slug' => Str::slug('Home Decor', '-'),
                "name_ar" => "ديكور",
                "description" => "Items used to make a home or space more beautiful or enjoyable.",
                "image" => "6.png",
                "created_at" => Carbon::now(),
               
            ],
            [
                "name_en" => "Gardening",
                'category_slug' => Str::slug('Gardening', '-'),
                "name_ar" => "حديقة",
                "description" => "Tools and supplies used for the practice of growing and cultivating plants.",
                "image" => "7.png",
                "created_at" => Carbon::now(),
              
            ],
   
        ]);
    }
}
