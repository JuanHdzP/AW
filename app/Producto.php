<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'precio',
        'foto',
        'descripcion',
        'categoria_id',
        ];
}
