<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $fillable = ['status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function log()
    {
        return $this->hasOne(Log::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
