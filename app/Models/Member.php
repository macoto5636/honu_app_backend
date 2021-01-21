<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";

    protected $fillable = [
        "member_name",
        "memory_id",
    ];

    /**
     * タイムスタンプ更新するかどうか
     */
    public $timestamps = false;
}