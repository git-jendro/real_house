<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmenityRules extends Model
{
    protected $table = 'amenity_rules';

    protected $fillable = [
        'id_unit', 'id_amenity'
    ];

    protected $primaryKey = 'id_rules';

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'id_unit', 'id_unit');
    }

    public function amenity()
    {
        return $this->belongsTo('App\Amenity', 'id_amenity', 'id_amenity');
    }
}
