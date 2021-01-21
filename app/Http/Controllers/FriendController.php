<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Friend;
use Auth;

class FriendController extends Controller
{
    /**
    * ユーザーのフレンドを取得する
    */

    public function getUserFriend($id){
        $user_id = Auth::id();
        $friends = Friend::where('user_id', $user_id)->get();

        return  response()->json($friends);
     }

    /**
    * ユーザーのフレンドを登録する
    */
    public function addUserFriend(Request $request){
        $input = $request->all();

        $user_id = Auth::id();

        $friend = Friend::create([
            'friend_name' => $input['friend_name'],
            'user_id' => $user_id
        ]);

        $id = $friend->id;
        return $id;
    }

    /**
    * friendを削除する
    */
    public function deleteUserFriend($id){
        $friend = Friend::find($id);
        $friend->delete();

        return $friend;
    }
    

}