<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate_plat extends Model
{
    protected $table = "cate_plat";
    protected $primaryKey = ["category_id", "platform_id"];

    public $timestamps = true;
    public $incrementing = false;
}
