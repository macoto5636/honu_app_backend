<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $table = "memories";
    protected $fillable = [
        "memory_title",
        "public_flag",
        "memory_latitude",
        "memory_longitude",
        "memory_adress",
        "thumbnail_path",
        "memory_good",
        "user_id",
        "category_id",
        "memory_music",
        "time_message_video_path",
        "playback_at",
        "reservation_at",
        "scheduled_at",
        "created_at",
        "updated_at",
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function member(){
        return $this->hasMany('App\Models\Member');
    }

    public function video(){
        return $this->hasMany('App\Models\Video');
    }
}