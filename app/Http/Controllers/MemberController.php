<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memory;
use App\Models\Member;
use Auth;

class MemberController extends Controller
{
    /**
    * 思い出取得
    */
    public function getMemory(){
        //$user - $request->user()->id;
        $memories = Memory::all();

        return  response()->json($memories);
     }

    /**
    * 追加
    */
    public function addVideos(Request $request){
        $input = $request->all();

        $member = Member::create([
            'member_name' => $input['member_name'],
            'memory_id' => $input['memory_id'],
        ]);

        $id = $memory->id;
        return $id;
    }
}