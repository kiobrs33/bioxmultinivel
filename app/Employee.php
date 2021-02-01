<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

//Importando DB
use Illuminate\Support\Facades\DB;
use biox2020\User;

class Employee extends Model
{
    protected $table = 'employees';

    public $timestamps = false;

    protected $fillable = [
        'nombresTrabajador',
        'apellidoPaternoTrabajador',
        'apellidoMaternoTrabajador',
        'telefonoTrabajador',
        'direccionTrabajador',
        'dniTrabajador',
        'sexoTrabajador',
        'slugTrabajador',
        'users_id'
    ];

    // Funcion para Guaradar Trabajador
    public static function guardarTrabajador($request){
        DB::transaction(function() use($request){
            $usuario = User::create([
                'name'          => substr($request->dni,0,5).str_random(3),
                'password'      => bcrypt($request->password),
                'email'         => $request->correo,
                'type_user_id'  => 3//Tipo de Usuario del empleado
            ]);

            Employee::create([
                'nombresTrabajador'         => $request->nombres,
                'apellidoPaternoTrabajador' => $request->apellido_paterno,
                'apellidoMaternoTrabajador' => $request->apellido_materno,
                'telefonoTrabajador'        => $request->telefono,
                'direccionTrabajador'       => $request->direccion,
                'dniTrabajador'             => $request->dni,
                'sexoTrabajador'            => $request->sexo,
                'slugTrabajador'            => str_random(10),
                'users_id'                  => $usuario->id
            ]);
        });
    }

    // Funcion para mostrar Informacion del Trabajador
    public static function verTrabajador($slug){
        $dato = DB::table('employees as e')
        ->join('users as u','e.users_id','=','u.id')
        ->select('u.id as users_id','u.name as usernameTrabajador','u.email as correoTrabajador','e.*')
        ->where('e.slugTrabajador','=',$slug)
        ->get();

        return $dato[0];
    }

    // Funcion para Actualizar datos del trabajador en 2 tablas
    public static function actualizarTrabajador($request){
        DB::transaction(function() use($request){
            Employee::where('id',$request->id_trabajador)
            ->update([
                'nombresTrabajador'         => $request->nombres,
                'apellidoPaternoTrabajador' => $request->apellido_paterno,
                'apellidoMaternoTrabajador' => $request->apellido_materno,
                'telefonoTrabajador'        => $request->telefono,
                'direccionTrabajador'       => $request->direccion,
                'dniTrabajador'             => $request->dni,
                'sexoTrabajador'            => $request->sexo
            ]);
        
            User::where('id',$request->id_usuario)
            ->update([
                'email' => $request->correo
            ]);
        });
    }
}