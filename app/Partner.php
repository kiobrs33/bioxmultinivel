<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

//Importando DB
use Illuminate\Support\Facades\DB;

//Para la fecha
use Carbon\carbon;

use biox2020\User;
use biox2020\Product;
use biox2020\DetailsInscription;
use biox2020\Inscription;
use biox2020\Package;

class Partner extends Model
{
    protected $table = 'partners';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombresSocio',
        'apellidoPaternoSocio',
        'apellidoMaternoSocio',
        'fechaNacimientoSocio',
        'direccionSocio',
        'dniSocio',
        'sexoSocio',
        'telefonoSocio',
        'paisSocio',
        'departamentoSocio',
        'provinciaSocio',
        'distritoSocio',
        'users_id',
        'ranks_id',
        'slugSocio'
    ];

    // Relaciones con ELOQUENT
    public function Usuario(){
        return $this->belongsTo('biox2020\User','users_id');
    }

    // Funcion para GUARDAR NUEVO SOCIO - ADMINISTRADOR
    public static function guardarSocio($request){

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
            Partner::create([
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
            
        });
        
        // Retornando LAS CREDENCIALES DEL NUEVO SOCIO
        return ['usuario'=>$username,'password'=>$password];
    }

    // Funcion para ver la informacion del SOCIO - ADMINISTRADOR
    public static function verSocio($slug){
        $informacionSocio = DB::table('users as u')
            ->join('partners as p','p.users_id','=','u.id')
            ->join('inscriptions as i','i.followers_id','=','p.id')
            // ->join('partners as p2','p2.id','=','i.partners_id')
            ->select('u.name as usernameSocio',
            // 'u.email as correoSocio',
            // 'p.id as idSocio',
            // 'p.nombresSocio',
            // 'p.apellidoPaternoSocio',
            // 'p.apellidoMaternoSocio',
            // 'p.dniSocio',
            // 'p.fechaNacimientoSocio',
            // 'p.direccionSocio',
            // 'p.telefonoSocio',
            // 'P.sexoSocio',
            // 'P.paisSocio',
            // 'P.departamentoSocio',
            // 'P.provinciaSocio',
            // 'P.distritoSocio',
            // 'p.slugSocio',
            // // Informacion del Lider
            // 'p2.nombresSocio as nombresLider',
            // 'p2.apellidoPaternoSocio as apellidoPaternoLider',
            // 'p2.apellidoMaternoSocio as apellidoMaternoLider',
            // // Informacion de la inscripcion
            // 'i.fechaInscripcion'
            )
            ->where('p.slugSocio','=',$slug)
            ->get();
        dd($informacionSocio);
        return $informacionSocio[0];
    }
    
    // Funcion para mostrar INFORMACION DE UN SOCIO DIRECTO - ADMINISTRADOR
    public static function verMiSocio($slug){
        $datos = DB::table('users as u')
                ->join('partners as p','p.users_id','=','u.id')
                ->join('inscriptions as i','i.followers_id','=','p.id')
                ->join('partners as p2','i.partners_id','=','p2.id')
                ->join('users as u2','u2.id','=','p2.users_id')
                ->select('u.name as username',
                'u.email as correo_electronico',
                'p.nombresSocio',
                'p.apellidoPaternoSocio',
                'p.apellidoMaternoSocio',
                'p.dniSocio',
                'p.fechaNacimientoSocio',
                'p.direccionSocio',
                'p.telefonoSocio',
                'i.fechaInscripcion',
                'p2.nombresSocio as nombres_lider',
                'p2.apellidoPaternoSocio as apellido_paterno_lider',
                'p2.apellidoMaternoSocio as apellido_materno_lider',
                'u2.name as username_lider')
                ->where('p.slugSocio','=',$slug)
                ->get();
        return $datos[0];
    }

    // =================================================================================================================================

    // Funcion para Mostrar arbol de Socios Directos - SOCIO
    public static function arbolSocios($slug){
        // Obteniendo el SLUG DEL SOCIO LOGUEADO
        $myslug = Auth()->user()->Socio->slugSocio;

        // Esta condicion nos permite saber SI EL CABECILLA DEL ARBOL ES EL SOCIO LOGUEADO O UNOS DE SUS SEGUIDORES
        if( $myslug == $slug ){
            // Si el SLUG del socio LOGUEADO COINCIDE CON EL SLUG recibido desde el CONTROLADOR
            // Se devolvera la informacion del SOCIO sin el SLUG
            $lider = DB::table('users as u')
                ->join('partners as p','p.users_id','=','u.id')
                ->select('u.name as username','p.nombresSocio','p.apellidoPaternoSocio','p.apellidoMaternoSocio')
                ->where('p.slugSocio','=',$slug)
                ->get();    
        }else{
            // En el caso que sea DISTINTOS
            // Se devolvera la informacion del SOCIO con SLUG que se usara para SUBIR O BAJAR EN EL ARBOL UNINIVEL
            $lider = DB::table('users as u')
                ->join('partners as p','p.users_id','=','u.id')
                ->join('inscriptions as i','i.followers_id','=','p.id')
                ->join('partners as p2','i.partners_id','=','p2.id')
                ->select('u.name as username','p.nombresSocio','p.apellidoPaternoSocio','p.apellidoMaternoSocio','p2.slugSocio as slug_lider')
                ->where('p.slugSocio','=',$slug)
                ->get();
        }

        // Si la informacion del LIDER tiene SLUG quieres decir que es un seguidor del SOCIO LOGUEADO
        // Esto nos permitira manejar un boton de SUBIR DE NIVEL EN LA VISTA TREE-PARTNERS

        // Aqui obtenemos los SEGUIDORES o socios directos 
        $socios_directos = DB::table('partners as p')
                ->join('inscriptions as i','i.partners_id','=','p.id')
                ->join('partners as p2','i.followers_id','=','p2.id')
                ->join('users as u2','p2.users_id','=','u2.id')
                ->select('u2.name as username','p2.nombresSocio','p2.slugSocio','p2.telefonoSocio')
                ->where('p.slugSocio','=',$slug)
                ->get();
                
        // Devolvemos un ARRAY CON LA INFONCION DEL LIDER Y SUS SEGUIDORES
        return [$lider,$socios_directos];
    }

    // Funcion para OBTENER LOS SOCIOS DIRECTOS CON DATATABLE - SOCIO
    public static function listaSocios($slug_socio){
        $inscripciones = DB::table('inscriptions as i')
        ->join('partners as p','p.id','=','i.partners_id')
        ->join('partners as p2','p2.id','=','i.followers_id')
        ->join('users as u2','u2.id','=','p2.users_id')
        ->select(
            'i.id',
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
        ->editColumn('slugSocio','partnerviews.partners.actions')
        ->rawColumns(['slugSocio'])
        ->toJson();
    }

}