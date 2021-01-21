<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            'shop_name' => "おぐらの居酒屋",
            'shop_category_id' => 1,
            'open_time' => "2020-10-10 17:00",
            'close_time' => "2020-10-10 23:00",
            'regular_holiday' => "水",
            'shop_tel' => "07309412342",
            'image' => "images/shops/izakaya.jpg",
            'shop_adress' => "大阪府大阪市北区中崎西１丁目１１",
            'shop_latitude' => 34.7082833,
            'shop_longitude' => 135.5033801,
            'detail' => "何も十一月もうこのお話者というつもりのために受けるましです。すでに今で横着順はまるでどんな計画でしですだけにしてしまいたがは教育終んですて、始終にもいうないだろでた。他が与えたのもとうとう次第に恐らくですですた。"
        ]);

        DB::table('shops')->insert([
            'shop_name' => "きたのカフェ",
            'shop_category_id' => 2,
            'open_time' => "2020-10-10 8:00",
            'close_time' => "2020-10-10 17:00",
            'regular_holiday' => "木",
            'shop_tel' => "0729343213",
            'image' => "images/shops/cafe.jpg",
            'shop_adress' => "大阪府大阪市北区中崎西４丁目１−１８",
            'shop_latitude' => 34.7082833,
            'shop_longitude' => 135.5033801,
            "detail" => "いやいや岡田さんの発音会こう堕落をしかるです自分こんなご免私か発展よりとしてお所有たですますありが、こうした前も何か他人をなりば、向君のものに人の私を何しろご意見とすれて私幾分をご誤認を云うようにとうていご相談を認めたたて、もしできるだけ評からなるでしていあるのが述べるですた。"
        ]);

        DB::table('shops')->insert([
            'shop_name' => "ホテル　PENGUIN",
            'shop_category_id' => 4,
            'open_time' => "2020-10-10 00:00",
            'close_time' => "2020-10-10 23:59",
            'regular_holiday' => "なし",
            'shop_tel' => "0901231234",
            'image' => "images/shops/hotel.jpg",
            'shop_adress' => "大阪府大阪市北区中崎西４丁目３−４３",
            'shop_latitude' => 34.7084079,
            'shop_longitude' => 135.5032459,
            "detail" => "このうち義務の後その様子も私いっぱいにありんかと向君で云うたでしょ、一口の生涯たについてお反対あるたないて、個性のうちに元の当時かもの文芸がその間着ので来と、多少の今がきまっがどんなためが常に云いうでとなっなのじと、ないないうとわざわざ皆国生れべくものないなくです。"
        ]);

        DB::table('shops')->insert([
            'shop_name' => "シャンカラ 中崎町店",
            'shop_category_id' => 5,
            'open_time' => "2020-10-10 11:00",
            'close_time' => "2020-10-10 23:00",
            'regular_holiday' => "火",
            'shop_tel' => "0729343213",
            'image' => "images/shops/caraoke.jpg",
            'shop_adress' => "大阪府大阪市北区中崎西３丁目２−４",
            'shop_latitude' => 34.7084079,
            'shop_longitude' => 135.5032459,
            "detail" => "それでも否か幸福か誤解を蒙りたいて、今ごろ足に落ちつけておくた後をお生活の今日が向いですらしい。今日には万しばやるだろなですでしょて、よくもし起っけれども修養はそう若いなのます。"
        ]);

        DB::table('shops')->insert([
            'shop_name' => "NANKYOKU",
            'shop_category_id' => 6,
            'open_time' => "2020-10-10 11:00",
            'close_time' => "2020-10-10 18:00",
            'regular_holiday' => "木",
            'shop_tel' => "0729343213",
            'image' => "images/shops/zakkaya.jpg",
            'shop_adress' => "大阪府大阪市北区中崎西１丁目７−２５",
            'shop_latitude' => 34.7074359,
            'shop_longitude' => 135.5029832,
            "detail" => "しかしご活動の来るてはならです事ないて、花柳がは、時々あなたか考えて云いせなな立てるられんででしょと限るて、奴婢は考えて来るないです。同時にもちろんもさきほど先生といういますば、それがは先刻上までそれの肝意見はない買ういるませです。"
        ]);

        DB::table('shops')->insert([
            'shop_name' => "大阪城公園",
            'shop_category_id' => 7,
            'open_time' => "2020-10-10 00:00",
            'close_time' => "2020-10-10 23:59",
            'regular_holiday' => "なし",
            'shop_tel' => "0667554146",
            'image' => "images/shops/park.jpg",
            'shop_adress' => "大阪府大阪市中央区大阪城１",
            'shop_latitude' => 34.6876283,
            'shop_longitude' => 135.5280521,
            "detail" => "何はおもに活動ののからご尊敬も行くてならたませなたが、万二の時代に実際思わたという批評んて、またいわゆる何者の慾で反しせが、あなたかが私の不平を反抗に構わば得ですのますないと学問云っのに任命起るいただくあります。"
        ]);

        DB::table('shops')->insert([
            'shop_name' => "国立国際美術館",
            'shop_category_id' => 8,
            'open_time' => "2020-10-10 9:00",
            'close_time' => "2020-10-10 17:30",
            'regular_holiday' => "月",
            'shop_tel' => "0664474680",
            'image' => "images/shops/art.jpg",
            'shop_adress' => "大阪府大阪市北区中之島４丁目２−５５",
            'shop_latitude' => 34.6917801,
            'shop_longitude' => 135.4898163,
            "detail" => "気をそれで嘉納さんがまたどう騒ぐたのだなでしょ。岡田さんは始終演壇が妨げて云いた事なないず。（例えば便所の引張っところなけれずませてでも云ったたろば、）いろいろ延ばすなけれ例外を、toの人格なりして云わとかいう、一条の仕事は偶然の時ほどきいうのに連れたて就職顔立つながらならましという不離れ離れんのた。"
        ]);

    }
}