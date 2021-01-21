<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "friends";

    protected $fillable = ["friend_name", "user_id"];

    /**
     * タイムスタンプ更新するかどうか
     */
    public $timestamps = false;
}