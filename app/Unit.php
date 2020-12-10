<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guard = 'id';

    public function marketing()
    {
        return $this->belongsTo(User::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function rule()
    {
        return $this->hasMany(AmenityRules::class);
    }

    public function image()
    {
        return $this->hasMany(UnitImage::class);
    }
}
