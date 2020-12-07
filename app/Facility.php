<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'nama', 'icon'
    ];

    protected $primaryKey = 'id_facility';

    public function rules()
    {
        return $this->hasMany('App\facilityRules', 'id_facility');
    }
}
