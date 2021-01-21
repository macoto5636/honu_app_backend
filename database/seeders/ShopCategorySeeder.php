<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_categories')->insert([
            'shop_category_name' => "居酒屋",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "カフェ",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "アミューズメント",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "ホテル",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "カラオケ",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "雑貨屋",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "公園",
        ]);

        DB::table('shop_categories')->insert([
            'shop_category_name' => "美術館/博物館",
        ]);
    }
}