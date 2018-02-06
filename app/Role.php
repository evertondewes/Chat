<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function users(){
        return $this->hasMany('\Chat\User');
    }
}
