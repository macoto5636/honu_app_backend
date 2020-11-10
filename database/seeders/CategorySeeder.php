<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'category_name' => "イベント",
        ]);

        DB::table('categories')->insert([
            'category_name' => "ランチ",
        ]);

        DB::table('categories')->insert([
            'category_name' => "ディナー",
        ]);

        DB::table('categories')->insert([
            'category_name' => "遊び",
        ]);

        DB::table('categories')->insert([
            'category_name' => "飲み会",
        ]);

        DB::table('categories')->insert([
            'category_name' => "観光",
        ]);

        DB::table('categories')->insert([
            'category_name' => "ショッピング",
        ]);
    }
}
