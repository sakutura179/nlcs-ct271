<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "category_id";

    protected $fillable = [
        'category_name', 'category_fullname',
    ];

    public $timestamps = true;

    public function categoryHasNews()
    {
        return $this->hasMany(News::class, 'category_id', 'category_id');
    }

    public function categoryBelongsToPlatform()
    {
        return $this->belongsToMany(Platform::class, 'cate_plat', 'category_id', 'platform_id');
    }
}
