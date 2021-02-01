<?php

namespace biox2020\Http\Controllers\Auth;

use biox2020\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // ESTAS FUNCIONES SOBREESCRIBEN A LAS QUE TIENE EL PROYECTO, esto permite personalizarlos sin tener errores
    public function redirectPath(){

        $tipo_usuario = Auth()->user()->TipoUsuario->tipo_usuario;

        if($tipo_usuario  == 'admin'){
            return '/admin';
        }
        if($tipo_usuario == 'partner'){
            return '/partner/partners';
        }
        if($tipo_usuario == 'employee'){
            return '/employee/orders/index';
        }

        return '/welcome';
    }

    //Funcion para redirigir a una VISTA PERSONALIZADA
    public function showLoginForm()
    {
        return view('authpersonalizado.login');
    }

    //Funcion para UTILIZAR UN CAMPOR PERSONALOZADO PARA EL LOGIN
    //Tambien se debe cambiar en la VISTA LOGIN
    public function username()
    {
        return 'name';
    }
}