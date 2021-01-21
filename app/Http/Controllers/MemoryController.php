<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Memory;
use App\Models\Member;
use App\Models\Video;

class MemoryController extends Controller
{
    /**
    * 思い出取得
    */
    public function getMemories(){
        $user = Auth::id();
        $memories = Memory::where('user_id', $user)->get();

        $data = [];
        foreach($memories as $memory){
            $videos = $memory->video;
            $videoList = [];
            $pictureList = [];
            foreach($videos as $video){
                //var_dump($video);
                $videoList[] = $video["video_path"];
                $pictureList[] = $video["picture_path"];
            }

            $data[] = [
                'id' => $memory->id,
                'title' => $memory->memory_title,
                'public_flag' => $memory->public_flag,
                'memory_latitude' => $memory->memory_latitude,
                'memory_longitude' => $memory->memory_longitude,
                'memory_address' => $memory->memory_adress,
                'thubnail_path' => $memory->thumbnail_path,
                'memory_good' => $memory->memory_good,
                'category_name' => $memory->category->category_name,
                'memory_music' => $memory->memory_music,
                'time_message_video_path' => $memory->time_message_video_path,
                'playback_at' => $memory->playback_at,
                'reservation_at' => $memory->reservation_at,
                'scheduled_at' => $memory->scheduled_at,
                "videos" => $videoList,
                "pictures" => $pictureList,
                "member" => $memory->member, 
                "user_name" => $memory->user->user_name,
                "user_profile" => $memory->user->profile_image_path,
                "user_role" => $memory->user->role,              
            ];
        }
        return  response()->json($data);
    }

    /**
     * 自分以外の思い出取得
     */
    public function getOtherMemories(){
        date_default_timezone_set('Asia/Tokyo');
        $user = Auth::id();
        $memories = Memory::where('user_id', "!=", $user)->where('public_flag', 1)->where('scheduled_at', "<=", date('Y-m-d H:i:s'))->get();

        $data = [];
    
        foreach($memories as $memory){
            $videos = $memory->video;
            $videoList = [];
            $pictureList = [];
            foreach($videos as $video){
                //var_dump($video);
                $videoList[] = $video["video_path"];
                $pictureList[] = $video["picture_path"];
            }

            $data[] = [
                'id' => $memory->id,
                'title' => $memory->memory_title,
                'public_flag' => $memory->public_flag,
                'memory_latitude' => $memory->memory_latitude,
                'memory_longitude' => $memory->memory_longitude,
                'memory_address' => $memory->memory_adress,
                'thubnail_path' => $memory->thumbnail_path,
                'memory_good' => $memory->memory_good,
                'category_name' => $memory->category->category_name,
                'memory_music' => $memory->memory_music,
                'time_message_video_path' => $memory->time_message_video_path,
                'playback_at' => $memory->playback_at,
                'scheduled_at' => $memory->scheduled_at,
                'reservation_at' => $memory->reservation_at,
                "videos" => $videoList,
                "pictures" => $pictureList,
                "member" => $memory->member, 
                "user_name" => $memory->user->user_name,
                "user_profile" => $memory->user->profile_image_path,
                "user_role" => $memory->user->role,  
                "created_at" => $memory->created_at,             
            ];
        }
        return  response()->json($data);
    }

    /**
     *  思い出検索
    */
    public function searchMemories(Request $request){
        $user = Auth::id();
        $input = $request->all();
        $word = $input["word"];
        $memories = Memory::orWhere('memory_title', 'like', "%$word%")->orWhere('memory_adress', 'like', "%$word%")->get();
        return response()->json($memories);
    }

    /**
    * 思い出追加 
    * ついでにメンバーとビデオ登録
    */
    public function addMemory(Request $request){
        $input = $request->all();
        $user_id = Auth::id();

        //思い出の基本情報を登録
        $memory = Memory::create([
            'memory_title' => $input['memory_title'],
            'public_flag' => $input['public_flag'],
            'memory_latitude' => $input['x'],
            'memory_longitude' => $input['y'],
            'memory_adress' => $input['address'],
            'thumbnail_path' => $input['thumbnail_path'],
            'memory_good' => 0,
            'user_id' => $user_id,
            'category_id' => $input['category_id'],
            'memory_music' => $input['memory_music'],
            'scheduled_at' => $input['scheduled_at'],
            'time_message_video_path' => $input['time_message_video_path'],
            'reservation_at' => $input['reservation_at'],
        ]);

        //登録した思い出のIDを取得
        $id = $memory->id;

        //membersに登録
        for($i=0; $i<count($input['member']); $i++){
            //$memberList[] = $input['member'][$i];
            $member = Member::create([
                'member_name' => $input['member'][$i],
                'memory_id' => $id,
            ]); 
        }

        //写真、動画のパスをvideosに登録
        for($i=0; $i<count($input['picture_paths']); $i++){
            //nullじゃない時だけ登録
            if(!is_null($input['picture_paths'][$i])){
                $picture = Video::create([
                    'video_path' => $input['video_paths'][$i],
                    'picture_path' => $input['picture_paths'][$i],
                    'memory_id' => $id,
                ]);
            }
        }

        return $id;
    }
}