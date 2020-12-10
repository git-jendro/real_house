<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitImage extends Model
{
    protected $table = 'unit_images';

    protected $guard = 'id';

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
