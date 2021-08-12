<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Viewer extends Authenticatable
{
    protected $table = "viewers";
    protected $primaryKey = "username";
    
    protected $fillable = [
        'username', 'password', 'fullname', 'email', 'birth_day', 
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
    public $incrementing = false;
    
    public function viewerHasComment()
    {  
        return $this->hasMany(Comment::class, 'username', 'username');
    }

    public function viewerBelongsToRole()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
