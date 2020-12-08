<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmenityRules extends Model
{
    protected $table = 'amenity_rules';

    protected $guard = 'id';

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function amenity()
    {
        return $this->belongsTo(Amenity::class);
    }
}
