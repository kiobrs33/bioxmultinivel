<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

//Importando DB
use Illuminate\Support\Facades\DB;

//Para la fecha
use Carbon\carbon;

class Package extends Model
{
    protected $table = 'packages';

    public $timestamps = false;

    protected $fillable = [
        'nombrePaquete',
        'puntosPaquete',
        'fechaRegistroPaquete',
        'slugPaquete'
    ];

    // Funcion para GUARDAR EL NUEVO PAQUETE
    public static function guardarPaquete($request){
        // TRANSACTION controla cualquier error que se genere en la operaciones CON LA BASE DE DATOS
        DB::transaction(function() use($request){
            $paquete = Package::create([
                'nombrePaquete'         => $request->nombre,
                'puntosPaquete'         => $request->puntos,
                'fechaRegistroPaquete'  => new Carbon(),
                'slugPaquete'           => str_random(10)
            ]);

            if($request->producto){
                foreach ($request->producto as $position => $value) {
                    DetailsPackage::create([
                        'cantidadDetallePaquete'=> $request->cantidad[$position], 
                        'products_id'           => $request->producto[$position],
                        'packages_id'           => $paquete->id
                    ]);
                }
            }
        });
    }

    // Esta funcion devuele la INFORMACION DEL PAQUETE
    public static function informacionPaquete($slug_paquete){

        $paquete = DB::table('packages')
        ->where('slugPaquete','=',$slug_paquete)
        ->get();

        $detallesPaquete = DB::table('packages as p')
        ->join('details_packages as d','d.packages_id','=','p.id')
        ->join('products as pr','d.products_id','=','pr.id')
        ->select(
            'd.cantidadDetallePaquete as cantidadProducto',
            'pr.id as idProducto',
            'pr.precioProducto',
            'pr.nombreProducto',
            'pr.puntosProducto')
        ->where('p.slugPaquete','=',$slug_paquete)
        ->get();

        return [$paquete[0],$detallesPaquete];
    }


    // Esta funcion devuele El CONTENIDO DEL PAQUETE PARA UNS INSCRIPCION - MODIFICAR
    public static function informacionPaqueteParaInscripcion($id_paquete){
        $data = DB::table('packages as p')
        ->join('details_packages as d','d.packages_id','=','p.id')
        ->join('products as pr','d.products_id','=','pr.id')
        ->select(
            'd.cantidadDetallePaquete as cantidadProducto',
            'pr.id as idProducto',
            'pr.precioProducto',
            'pr.nombreProducto',
            'pr.puntosProducto')
        ->where('p.id','=',$id_paquete)
        ->get();

        return $data;
    }


}