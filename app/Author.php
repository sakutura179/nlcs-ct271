<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    protected $table = "authors";
    protected $primaryKey = "username";
    
    protected $fillable = [
        'username', 'password', 'role_id', 'fullname', 'email', 'birth_day', 
        'address', 'phone_no', 'level', 'salary', 'b_account_no'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
    public $incrementing = false;
    
    public function authorHasNews()
    {
        return $this->hasMany(News::class, 'username', 'username');
    }

    public function authorBelongsToRole()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
