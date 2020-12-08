<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityRules extends Model
{
    protected $table = 'facility_rules';

    protected $guard = 'id';

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
