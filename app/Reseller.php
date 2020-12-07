<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $guard = 'id';

    public function marketing()
    {
        return $this->belongsTo(User::class);
    }
}
