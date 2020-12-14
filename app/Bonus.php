<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $guard = 'id';

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
