<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class DetailsPackage extends Model
{
    protected $table = 'details_packages';

    public $timestamps = false;

    protected $fillable = [
        'cantidadDetallePaquete', 
        'products_id',
        'packages_id'
    ];
}