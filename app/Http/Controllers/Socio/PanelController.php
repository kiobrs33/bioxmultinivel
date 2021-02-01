<?php

namespace biox2020\Http\Controllers\Socio;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;

use biox2020\User;
use biox2020\Partner;
use biox2020\Inscription;
use biox2020\Order;

class PanelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function dashboard(){
        // Obteniendo informacion del SOCIO logueado
        $id_socio = Auth()->user()->id;
        $usuario = User::find($id_socio)->first();
        $informacion = Partner::where('users_id',$id_socio)->first();
        return view('partnerviews.panel.dashboard', compact('usuario','informacion'));
    }

    public function create()
    {
        
    }

    public function store(CategorieRequest $request)
    {
        
    }

    public function show($slug)
    { 
        
    }

    public function edit($slug)
    {
        
    }

    public function update(CategorieRequest $request)
    {
        
    }

    public function destroy($id)
    {
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroPuntos(){
    }

    public function NumeroInscripciones(){
        $id_socio = Auth()->user()->socio()->id;
        $res = Inscription::where('parnerts_id',$id_socio)->count();
        return $res;
    }

    public function NumeroSeguidores(){
        $id_socio = Auth()->user()->socio()->id;
        $res = Inscription::where('parnerts_id',$id_socio)
        ->where('estadoPedido',     )
        ->count();
    }

    public function NumeroPedidos(){
        $id_socio = Auth()->user()->socio()->id;
        $res = Order::where('parnerts_id',$id_socio)->count();
        return $res;
    }
}