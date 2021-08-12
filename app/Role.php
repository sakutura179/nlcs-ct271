<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $primaryKey = "role_id";
    
    protected $fillable = [
        'role_id'
    ];

    public $timestamps = true;

    public function roleHasManyAdmin()
    {
        return $this->hasMany(Admin::class, 'role_id', 'role_id');
    }

    public function roleHasManyAuthor()
    {
        return $this->hasMany(Author::class, 'role_id', 'role_id');
    }

    public function roleHasManyViewer()
    {
        return $this->hasMany(Viewer::class, 'role_id', 'role_id');
    }
}
