<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'lihat', 'book', 'bayar'
    ];

    // public function reseller()
    // {
    //     return $this->belongsTo(Reseller::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
