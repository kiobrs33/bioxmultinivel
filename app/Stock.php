<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    public $timestamps = false;

    protected $fillable = [
        'cantidadStock',
        'products_id',
        'warehouses_id'
    ];
}