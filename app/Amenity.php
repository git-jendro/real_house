<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $guard = 'id';

    public function rules()
    {
        return $this->hasMany(AmenityRules::class);
    }
}
