<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $table = "platforms";
    protected $primaryKey = "platform_id";

    protected $fillable = [
        'platform_name',
    ];

    public $timestamps = true;

    public function platformBelongsToCategory()
    {
        return $this->belongsToMany(Category::class, 'cate_plat', 'platform_id', 'category_id');
    }
}
