<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityRules extends Model
{
    protected $table = 'facility_rules';

    protected $fillable = [
        'id_building', 'id_facility'
    ];

    protected $primaryKey = 'id_rules';

    public function building()
    {
        return $this->belongsTo('App\Building', 'id_building', 'id_building');
    }

    public function facility()
    {
        return $this->belongsTo('App\Facility', 'id_facility', 'id_facility');
    }
}
