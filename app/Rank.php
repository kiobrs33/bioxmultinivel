<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';

    public $timestamps = false;

    protected $fillable = [
        'nombreRango',
        'descripcionRango',
        'puntajePersonalRango',
        'puntajeGrupalRango',
        'puntajeDirectosRango',
        'activosFranquiciadosRango',
        'slugRango'
    ];
}