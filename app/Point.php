<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';

    public $timestamps = false;

    protected $fillable = [
        'tipo_puntos',
        'cantidad',
        'partners_id'
    ];
}
