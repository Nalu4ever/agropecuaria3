<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function factura () {
        return $this->belongsTo('App\Models\Factura');
    }

    public function producto () {
        return $this->belongsTo('App\Models\producto');
    }
}
