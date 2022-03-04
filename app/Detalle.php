<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    //
    protected $table = 'detalle';

    protected $fillable = [
        'cantidad',
        'precio',
        'producto_id',
        ];
}
