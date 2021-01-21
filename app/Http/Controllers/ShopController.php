<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Auth;

class ShopController extends Controller
{
    /**
    * 指定したIDのショップをとってくる
    */

    public function getShops($id){
        $ids = array();
        switch($id){
            case 1:
                $ids[] = 1;
                $ids[] = 2;
            break;
            case 2:
                $ids[] = 3;
                $ids[] = 7;
                $ids[] = 8;
            break;
            case 3:
                $ids[] = 4;
                $ids[] = 5;
            break;
            case 4:
                $ids[] = 1;
                $ids[] = 5;
            break;
            case 5: 
                $ids[] = 3;
                $ids[] = 7;
                $ids[] = 6;
                $ids[] = 8;
            case 6:
                $ids[] = 1;
                $ids[] = 4;
                $ids[] = 6;
            case 7:
                $ids[] = 1;
                $ids[] = 2;
                $ids[] = 6;
            break;                      

                
        }

        $shops = Shop::whereIn('shop_category_id', $ids)->get();
        $data = [];
        foreach($shops as $shop){
            $data [] = [
                'id' => $shop->id,
                'shop_name' => $shop->shop_name,
                'shop_category' => $shop->category->shop_category_name,
                'open_time' => $shop->open_time,
                'close_time' => $shop->close_time,
                'regular_holiday' => $shop->regular_holiday,
                'shop_tel' => $shop->shop_tel,
                'shop_address' => $shop->shop_adress,
                'shop_latitude' => $shop->shop_latitude,
                'shop_longitude' => $shop->shop_longitude,
                'image' => $shop->image,
                'detail' => $shop->detail,
            ];
        }

        return  response()->json($data);
     }

}