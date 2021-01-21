<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memory;
use App\Models\Video;

class VideoController extends Controller
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

        $video = Video::create([
            'video_path' => $input['video_path'],
            'picture_path' => $input['picture_path'],
            'memory_id' => $input['memory_id'],
        ]);

        $id = $video->id;
        return $id;
    }
}