<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = 'facturas';

    protected $fillable = [
        'fecha',
        'user_id',
        'detalle_id',
        ];
}
