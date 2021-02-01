<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    public $timestamps = false;

    protected $fillable = [
        'razonSocialProveedor',
        'rucProveedor',
        'direccionProveedor',
        'contactoProveedor',
        'telefonoProveedor',
        'slugProveedor'
    ];

    // Funcion para Guardar los nuevos Proveedores
    public static function guardarProveedor($request){
        Provider::create([
            'razonSocialProveedor'  => $request->razon_social,
            'rucProveedor'          => $request->ruc,
            'direccionProveedor'    => $request->direccion,
            'contactoProveedor'     => $request->contacto,
            'telefonoProveedor'     => $request->telefono,
            'slugProveedor'         => str_random(10)
        ]);
    }

    // Funcion para Actualizar los datos del Proveedor
    public static function actualizarProveedor($request){
        Provider::where('slugProveedor',$request->slug)
        ->update([
            'razonSocialProveedor'  => $request->razon_social,
            'rucProveedor'          => $request->ruc,
            'direccionProveedor'    => $request->direccion,
            'contactoProveedor'     => $request->contacto,
            'telefonoProveedor'     => $request->telefono,
        ]);
    }
}