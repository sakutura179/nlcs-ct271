<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "news_id";

    protected $fillable = [
        'category_id', 'username', 'header', 'content', 'pic', 'trending', 'view', 'slug',
    ];

    public $timestamps = true;

    public function newsBelongsToAuthor()
    {
        return $this->belongsTo(Author::class, 'username', 'username');
    }

    public function newsBelongsToCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function newsHasComment()
    {
        return $this->hasMany(Comment::class, 'news_id', 'news_id');
    }
}
