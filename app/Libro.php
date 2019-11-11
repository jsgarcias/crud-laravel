<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'Libro';
    protected $fillable = 
        [
            'nombre',
            'resumen',
            'paginas',
            'edicion',
            'autor',
            'precio'
        ];
}
