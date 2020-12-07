<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'nama', 'icon'
    ];

    protected $primaryKey = 'id_amenity';

    public function rules()
    {
        return $this->hasMany('App\AmenityRules', 'id_amenity');
    }
}
