<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    public function clients () {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function detalle_factura () {
        return $this->hasMany('App\Models\FacturaDetalle');
    }
}
