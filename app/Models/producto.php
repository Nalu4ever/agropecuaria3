<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    /**
     * The roles that belong to the producto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categorias()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
    public function FacturaDetalle () {
        return $this->hasMany('App\Models\FacturaDetalle');
    }
}
