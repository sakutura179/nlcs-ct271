<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admins";
    protected $primaryKey = "username";
    
    protected $fillable = [
        'username', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
    public $incrementing = false;

    public function adminBelongsToRole()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
