<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    
    protected $fillable = [
        'importe', 'balance',
    ];

    public function factura()
    {
        return $this->belongTo(factura::class);
    }

}