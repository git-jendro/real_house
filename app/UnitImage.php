<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitImage extends Model
{
    protected $table = 'unit_images';

    protected $primaryKey = 'id_image';

    protected $fillable = [
        'id_unit', 'path', 'main'
    ];

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'id_unit', 'id_unit');
    }
}
