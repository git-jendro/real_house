<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guard = 'id';
    
    
    public function building()
    {
        return $this->hasMany('App\Building');
    }
}
