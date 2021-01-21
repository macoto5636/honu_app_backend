<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    /**
     * 思い出を取得
     */
    public function memories()
    {
        return $this->hasMany('App\Models\Memory');
    }

    /**
     * タイムスタンプ更新するかどうか
     */
    public $timestamps = false;
}