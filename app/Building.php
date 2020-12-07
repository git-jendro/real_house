<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $primaryKey = 'id_building';

    protected $fillable = [
        'id_project', 'nama', 'lantai', 'luas', 'deskripsi'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project', 'id_project', 'id_project');
    }

    public function rules()
    {
        return $this->hasMany('App\FacilityRules', 'id_building');
    }

    public function unit()
    {
        return $this->hasMany('App\Unit', 'id_building');
    }
}
