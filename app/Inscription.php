<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

//Importando DB
use Illuminate\Support\Facades\DB;

//Para la fecha
use Carbon\carbon;

// Importando MODELOS
use biox2020\User;
use biox2020\Product;
use biox2020\Inscription;
use biox2020\Package;
use biox2020\Order;
use biox2020\DetailsOrder;

class Inscription extends Model
{
    protected $table = 'inscriptions';

    public $timestamps = false;

    protected $fillable = [
        'fechaInscripcion',
        'partners_id',
        'packages_id',
        'followers_id',
        'orders_id'
    ];

    // Funcion para GUARDAR NUEVO SOCIO - SIMPLE - Listo!
    public static function guardarSocioSimple($request){

        // Generando las credenciales del Nuevo Socio de forma Aleatoria
        $username = substr($request->dni, 0, 5).str_random(3);
        $password = 'biox'.str_random(4);
        // $password = 'biox123';

        // Funcion TRANSACTION para controlar errores en el guardado DE DATOS
        DB::transaction(function() use($request,$username,$password){

            // Guardando las credenciales del nuevo SOCIO
            $usuario = User::create([
                'name'          => $username,
                'email'         => $request->correo_electronico,
                'password'      => bcrypt($password),
                'type_user_id'  => 2 //COMO SOCIO - PARTNER
            ]);

            // Guardando la INFORMACION del nuevo SOCIO
            $seguidor = Partner::create([
                'nombresSocio'          => $request->nombres,
                'apellidoPaternoSocio'  => $request->apellido_paterno,
                'apellidoMaternoSocio'  => $request->apellido_materno,
                'fechaNacimientoSocio'  => $request->fecha_nacimiento,
                'direccionSocio'        => $request->direccion_domicilio,
                'dniSocio'              => $request->dni,
                'sexoSocio'             => $request->sexo,
                'telefonoSocio'         => $request->telefono,
                'paisSocio'             => $request->pais,
                'departamentoSocio'     => $request->departamento,
                'provinciaSocio'        => $request->provincia,
                'distritoSocio'         => $request->distrito,
                'slugSocio'             => str_random(10),
                'users_id'              => $usuario->id,//Obteniendo el ID de la cuenta generada en la BASE DE DATOS
                'ranks_id'              => null//No tiene RANGO
            ]);

            // Obteniendo el ID del USUARIO LOGUEADO - PATROCINADOR
            $id_patrocinador = $nombres = Auth()->user()->Socio->id;

            $inscripcion = Inscription::create([
                'fechaInscripcion'  => new Carbon(),
                'partners_id'       => $id_patrocinador,//Guardando el ID DEL PATROCINADOR
                'packages_id'       => null,
                'followers_id'      => $seguidor->id,//Guardando el ID de la informacion generada en la BASE DE DATOS
                'orders_id'         => null
            ]);

        });
        
        // Retornando LAS CREDENCIALES DEL NUEVO SOCIO
        return [
            'username'=>$username,
            'password'=>$password, 
            'nombresSocio'=> $request->nombres,
            'apellidoPaternoSocio'  => $request->apellido_paterno,
            'apellidoMaternoSocio'  => $request->apellido_materno,
        ];
    }

    // Funcion para GUARDAR NUEVO SOCIO - PAQUETE - Listo!
    public static function guardarSocioPaquete($request){
        // Generando las credenciales del Nuevo Socio de forma Aleatoria
        $username = substr($request->dni, 0, 5).str_random(3);
        // $password = 'biox'.str_random(4);
        $password = 'biox123';

        // Funcion TRANSACTION para controlar errores en el guardado DE DATOS
        DB::transaction(function() use($request,$username,$password){

            // Guardando las credenciales del nuevo SOCIO
            $usuario = User::create([
                'name'          => $username,
                'email'         => $request->correo_electronico,
                'password'      => bcrypt($password),
                'type_user_id'  => 2 //COMO SOCIO - PARTNER
            ]);

            // Guardando la INFORMACION del nuevo SOCIO
            $seguidor = Partner::create([
                'nombresSocio'          => $request->nombres,
                'apellidoPaternoSocio'  => $request->apellido_paterno,
                'apellidoMaternoSocio'  => $request->apellido_materno,
                'fechaNacimientoSocio'  => $request->fecha_nacimiento,
                'direccionSocio'        => $request->direccion_domicilio,
                'dniSocio'              => $request->dni,
                'sexoSocio'             => $request->sexo,
                'telefonoSocio'         => $request->telefono,
                'paisSocio'             => $request->pais,
                'departamentoSocio'     => $request->departamento,
                'provinciaSocio'        => $request->provincia,
                'distritoSocio'         => $request->distrito,
                'slugSocio'             => str_random(10),
                'users_id'              => $usuario->id,//Obteniendo el ID de la cuenta generada en la BASE DE DATOS
                'ranks_id'              => null//No tiene Rango
            ]);

            // Obteniendo el ID del USUARIO LOGUEADO - PATROCINADOR
            $id_patrocinador = $nombres = Auth()->user()->Socio->id;

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
                'partners_id'           => $seguidor->id,
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

            // Guardando la INSCRIPCION
            Inscription::create([
                'fechaInscripcion'  => new Carbon(),
                'partners_id'       => $id_patrocinador,//Guardando el ID DEL PATROCINADOR
                'packages_id'       => $request->paquete,//Guardando el ID del paquete SELECCIONADO en la vista
                'followers_id'      => $seguidor->id,//Guardando el ID de la informacion generada en la BASE DE DATOS
                'orders_id'         => $pedido->id//Guaradando el ID del pedido generado en La base de datos
            ]);

        });

        // Retornando LAS CREDENCIALES DEL NUEVO SOCIO
        return [
            'username'=>$username,
            'password'=>$password, 
            'nombresSocio'=> $request->nombres,
            'apellidoPaternoSocio'  => $request->apellido_paterno,
            'apellidoMaternoSocio'  => $request->apellido_materno,
        ];
    }

    // Funcion para GUARDAR NUEVO SOCIO - LIBRE - Listo!
    public static function guardarSocioLibre($request){

        // Generando las credenciales del Nuevo Socio de forma Aleatoria
        $username = substr($request->dni, 0, 5).str_random(3);
        // $password = 'biox'.str_random(4);
        $password = 'biox123';

        // Funcion TRANSACTION para controlar errores en el guardado DE DATOS
        DB::transaction(function() use($request,$username,$password){

            // Guardando las credenciales del nuevo SOCIO
            $usuario = User::create([
                'name'          => $username,
                'email'         => $request->correo_electronico,
                'password'      => bcrypt($password),
                'type_user_id'  => 2 //COMO SOCIO - PARTNER
            ]);

            // Guardando la INFORMACION del nuevo SOCIO
            $seguidor = Partner::create([
                'nombresSocio'          => $request->nombres,
                'apellidoPaternoSocio'  => $request->apellido_paterno,
                'apellidoMaternoSocio'  => $request->apellido_materno,
                'fechaNacimientoSocio'  => $request->fecha_nacimiento,
                'direccionSocio'        => $request->direccion_domicilio,
                'dniSocio'              => $request->dni,
                'sexoSocio'             => $request->sexo,
                'telefonoSocio'         => $request->telefono,
                'paisSocio'             => $request->pais,
                'departamentoSocio'     => $request->departamento,
                'provinciaSocio'        => $request->provincia,
                'distritoSocio'         => $request->distrito,
                'slugSocio'             => str_random(10),
                'users_id'              => $usuario->id,//Obteniendo el ID de la cuenta generada en la BASE DE DATOS
                'ranks_id'              => null//No tiene Rango
            ]);

            // Obteniendo el ID DEL PATROCINADOR
            $id_patrocinador = $nombres = Auth()->user()->Socio->id;

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
                'partners_id'           => $seguidor->id,
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

            // Guardando la INSCRIPCION
            Inscription::create([
                'fechaInscripcion'  => new Carbon(),
                'partners_id'       => $id_patrocinador,//Guardando el ID DEL PATROCINADOR
                'packages_id'       => null,
                'followers_id'      => $seguidor->id,//Guardando el ID de la informacion generada en la BASE DE DATOS
                'orders_id'         => $pedido->id//Guaradando el ID del pedido generado en La base de datos
            ]);

        });

        // Retornando LAS CREDENCIALES DEL NUEVO SOCIO
        return [
            'username'=>$username,
            'password'=>$password, 
            'nombresSocio'=> $request->nombres,
            'apellidoPaternoSocio'  => $request->apellido_paterno,
            'apellidoMaternoSocio'  => $request->apellido_materno,
        ];
    }

    // Funcion para OBTENER LAS INSCRIPCIONES CON DATATABLE
    public static function listaInscripciones($slug_socio){
        $inscripciones = DB::table('inscriptions as i')
        ->join('partners as p','p.id','=','i.partners_id')
        ->join('partners as p2','p2.id','=','i.followers_id')
        ->join('users as u2','u2.id','=','p2.users_id')
        ->select(
            'i.id',
            'i.fechaInscripcion',
            'p2.nombresSocio',
            'p2.apellidoPaternoSocio',
            'p2.apellidoMaternoSocio',
            'p2.dniSocio',
            'p2.slugSocio',
            'u2.email'
        )
        ->where('p.slugSocio','=',$slug_socio);
        return datatables()
        ->query($inscripciones)
        ->editColumn('slugSocio','partnerviews.inscriptions.actions')
        ->rawColumns(['slugSocio'])
        ->toJson();
    }

    // Funcion para ver INSCRIPCION
    public static function verInscripcion($slug_socio){

        // Obteniendo la informacion del SOCIO
        $data_01 = DB::table('inscriptions as i')
        ->join('partners as p','p.id','=','i.followers_id')
        ->join('users as u','u.id','=','p.users_id')
        ->select(
            'i.id',
            'i.fechaInscripcion',
            'p.nombresSocio',
            'p.apellidoPaternoSocio',
            'p.apellidoMaternoSocio',
            'p.fechaNacimientoSocio',
            'p.direccionSocio',
            'p.dniSocio',
            'p.sexoSocio',
            'p.telefonoSocio',
            'p.paisSocio',
            'p.departamentoSocio',
            'p.provinciaSocio',
            'p.distritoSocio',
            'u.email as correoSocio',
            'u.name as usernameSocio'
        )
        ->where('p.slugSocio','=',$slug_socio)
        ->get();


        // Obteniendo la informacion del LA INSCRIPCION POR PAQUETE
        $data_02 = DB::table('inscriptions as i')
        ->join('partners as p','p.id','=','i.followers_id')
        ->join('packages as pk','pk.id','=','i.packages_id')
        ->select(
            'pk.nombrePaquete',
        )
        ->where('p.slugSocio','=',$slug_socio)
        ->get();

        // Obteniendo la informacion de la ORDEN - Inscripcion
        $data_03 = DB::table('inscriptions as i')
        ->join('partners as p','p.id','=','i.followers_id')
        ->join('orders as o','o.id','=','i.orders_id')
        ->select(
            'o.codigoPedido',
            'o.totalPedido',
            'o.impuestoPedido',
            'o.subtotalPedido',
            'o.puntosTotalPedido',
            'o.numeroComprobantePedido',
            'o.fechaEntregaPedido',
            'o.estadoPedido'
        )
        ->where('p.slugSocio','=',$slug_socio)
        ->get();

        // Obtiendo los DETALLES DE LA ORDEN
        $data_04 = DB::table('inscriptions as i')
        ->join('partners as p','p.id','=','i.followers_id')
        ->join('details_orders as do','do.orders_id','=','i.orders_id')
        ->join('products as pr','pr.id','=','do.products_id')
        ->select(
            'do.cantidadDetallePedido',
            'do.precioDetallePedido',
            'do.subtotalPrecioDetallePedido',
            'do.puntosDetallePedido',
            'do.subtotalPuntosDetallePedido',
            'pr.codigoProducto',
            'pr.nombreProducto',
        )
        ->where('p.slugSocio','=',$slug_socio)
        ->get();

        // Condiciones para evaluar LA DATA DEVUELTA DE CADA CONSULTA
        $inscripcionDataSocio = (!empty($data_01[0])) ? $data_01[0] : [];
        $inscripcionPaquete = (!empty($data_02[0])) ? $data_02[0] : [];
        $inscripcionLibre = (!empty($data_03[0])) ? $data_03[0] : [];
        $inscripcionDetallesOrden = (!empty($data_04[0])) ? $data_04 : [];

        // Retornand un ARRAY DE DATOS
        return [
            $inscripcionDataSocio,
            $inscripcionPaquete,
            $inscripcionLibre,
            $inscripcionDetallesOrden
        ];
    }

}