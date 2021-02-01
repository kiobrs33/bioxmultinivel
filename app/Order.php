<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

//Importando DB
use Illuminate\Support\Facades\DB;

//Para la fecha
use Carbon\carbon;

use biox2020\DetailsOrder;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    protected $fillable = [
        'codigoPedido',
        'totalPedido',
        'impuestoPedido',
        'subtotalPedido',
        'puntosTotalPedido',
        'numeroComprobantePedido',
        'fechaPedido',
        'fechaEntregaPedido',
        'estadoPedido',
        'slugPedido',
        'partners_id',
        'employees_id'
    ];

    public static function guardarOrden($request){
        // Funcion TRANSACTION para controlar errores en el guardado DE DATOS
        DB::transaction(function() use($request){

            // Guardando el pedido de la inscripcion
            $pedido = Order::create([
                'codigoPedido'          => str_random(5),
                'totalPedido'           => $request->total,
                'impuestoPedido'        => $request->impuesto,
                'subtotalPedido'        => $request->subtotal,
                'puntosTotalPedido'     => $request->total_puntos,
                'numeroComprobantePedido'   => '',
                'fechaPedido'           => new Carbon(),
                'fechaEntregaPedido'    => $request->fecha_entrega,
                'estadoPedido'          => 'solicitado',
                'slugPedido'            => str_random(10),
                'partners_id'           => $request->socio,
                'employees_id'          => null
            ]);

            // Si existe PRODUCTOS EN EL CARRITO se procedera ALMACENARLO en la base de datos
            if($request->id_producto > 0)
            {
                // Ciclo FOR para recorrer cada item del CARRITO mediante las POSICIONES
                foreach($request->id_producto as $position=>$valor)
                {
                    DetailsOrder::create([
                        'cantidadDetallePedido'         => $request->cantidad_producto[$position],
                        'precioDetallePedido'           => $request->precio_producto[$position],
                        'subtotalPrecioDetallePedido'   => $request->subtotal_precio_producto[$position],
                        'puntosDetallePedido'           => $request->puntos_producto[$position],
                        'subtotalPuntosDetallePedido'   => $request->subtotal_puntos_producto[$position],
                        'products_id'                   => $request->id_producto[$position],
                        'orders_id'                     => $pedido->id// guardado el ID del PEDIDO generado anteriormente
                    ]);
                }
            }

        });
    }

    public static function verOrden($slug){
        $orden = DB::table('orders as o')
        ->join('partners as p','p.id','=','o.partners_id')
        ->join('users as u','u.id','=','p.users_id')
        ->select(
            'o.*',
            'p.nombresSocio',
            'p.apellidoPaternoSocio',
            'p.apellidoMaternoSocio',
            'u.name as username',
            'p.telefonoSocio',
            'u.email as correoSocio')
        ->where('o.slugPedido',$slug)
        ->get();

        $detalles_orden = DB::table('orders as o')
        ->join('details_orders as d','d.orders_id','=','o.id')
        ->join('products as p','p.id','=','d.products_id')
        ->select('d.cantidadDetallePedido',
        'd.precioDetallePedido',
        'd.subtotalPrecioDetallePedido',
        'd.puntosDetallePedido',
        'd.subtotalPuntosDetallePedido',
        'p.nombre_producto'  
        )
        ->where('o.slugPedido',$slug)
        ->get();

        return [$orden, $detalles_orden];
    }

    public static function verOrdenEmployee($slug){
        $orden = DB::table('orders as o')
        ->join('partners as p','p.id','=','o.partners_id')
        ->join('users as u','u.id','=','p.users_id')
        ->select(
            'o.*',
            'p.nombresSocio',
            'p.apellidoPaternoSocio',
            'p.apellidoMaternoSocio',
            'u.name as username',
            'p.telefonoSocio',
            'u.email as correoSocio')
        ->where('o.slugPedido',$slug)
        ->get();

        $detalles_orden = DB::table('orders as o')
        ->join('details_orders as d','d.orders_id','=','o.id')
        ->join('products as p','p.id','=','d.products_id')
        ->select('d.cantidadDetallePedido',
        'd.precioDetallePedido',
        'd.subtotalPrecioDetallePedido',
        'd.puntosDetallePedido',
        'd.subtotalPuntosDetallePedido',
        'p.nombreProducto'  
        )
        ->where('o.slugPedido',$slug)
        ->get();

        return [$orden, $detalles_orden];
    }

}