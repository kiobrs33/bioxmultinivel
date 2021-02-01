<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    public $timestamps = false;

    protected $fillable = [
        'nombreAlmacen',
        'direccionAlmacen',
        'tipoAlmacen',
        'slugAlmacen'
    ];
}