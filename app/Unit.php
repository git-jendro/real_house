<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guard = 'id';

    public function user()
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

    public function reseller()
    {
        return $this->hasOne(Reseller::class);
    }

    public function bonus()
    {
        return $this->hasOne(Bonus::class);
    }
}
