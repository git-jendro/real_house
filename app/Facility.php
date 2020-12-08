<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guard = 'id';

    public function rules()
    {
        return $this->hasMany(FacilityRules::class);
    }
}
