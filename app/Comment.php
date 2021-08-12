<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = "comment_id";

    protected $fillable = [
        'news_id', 'username',
    ];

    public function commentBelongsToNews()
    {
        return $this->belongsTo(News::class, 'news_id', 'news_id');
    }

    public function commentBelongsToViewer()
    {
        return $this->belongsTo(Viewer::class, 'username', 'username');
    }
}
