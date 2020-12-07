<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $primaryKey = 'id_unit';

    protected $fillable = [
        'id_building', 'nama', 'deskripsi', 'harga_jual', 'harga_sewa', 'harga_cicil', 'diskon'
    ];

    public function marketing()
    {
        return $this->belongsTo('App\User');
    }

    public function building()
    {
        return $this->belongsTo('App\Building', 'id_building');
    }

    public function rule()
    {
        return $this->hasMany('App\AmenityRules', 'id_unit');
    }

    public function image()
    {
        return $this->hasMany('App\UnitImage', 'id_unit');
    }
}
