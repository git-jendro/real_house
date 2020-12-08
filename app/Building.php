<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guard = 'id';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function rules()
    {
        return $this->hasMany(FacilityRules::class);
    }

    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
