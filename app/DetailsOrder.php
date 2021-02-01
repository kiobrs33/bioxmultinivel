<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class DetailsOrder extends Model
{
    protected $table = 'details_orders';

    public $timestamps = false;

    protected $fillable = [
        'cantidadDetallePedido',
        'precioDetallePedido',
        'subtotalPrecioDetallePedido',
        'puntosDetallePedido',
        'subtotalPuntosDetallePedido',
        'products_id',
        'orders_id' 
    ];
}