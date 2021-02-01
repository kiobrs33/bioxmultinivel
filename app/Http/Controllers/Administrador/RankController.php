<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Administrador\RankRequest;
use biox2020\Rank;

class RankController extends Controller
{
    // Funcion para mostrar lista de RANGOS
    public function index(){
        return view('adminviews.ranks.index');
    }

    // Funcion para Consultar Datos de la Tabla RANKS
    public function indexApi(){
        return datatables(Rank::query())
        ->setRowClass('filasTable')
        ->editColumn('slugRango','adminviews.ranks.actions')
        ->rawColumns(['slugRango'])
        ->toJson();
    }

    // Funcion para mostrar formulario
    public function create(){
        return view('adminviews.ranks.create');
    }

    // Funcion para guardar el nuevo RANGO
    public function store(RankRequest $request){
        Rank::create([
            'nombreRango'               => $request->nombre,
            'descripcionRango'          => $request->descripcion,
            'puntajePersonalRango'      => $request->puntaje_personal,
            'puntajeGrupalRango'        => $request->puntaje_grupal,
            'puntajeDirectosRango'      => $request->puntaje_directos,
            'activosFranquiciadosRango' => $request->activos_franquiciados,
            'slugRango'                 => str_random(10)
        ]);
        return redirect(route('admin.ranks.index'));
    }

    // Funcion para mostrar informacion del rango
    public function show($slug){ 
        $rango = Rank::where('slugRango',$slug)->first();
        return view('adminviews.ranks.show', compact('rango'));
    }

    // Funcion para mostrar Formulario con los daros del RANGO
    public function edit($slug){
        $rango = Rank::where('slugRango',$slug)->first();
        return view('adminviews.ranks.edit', compact('rango'));
    }

    // Funcion para guardar CAMBIOS EN los datos del RANGO
    public function update(RankRequest $request){
        Rank::where('slugRango',$request->slug_rango)->update([
            'nombreRango'               => $request->nombre,
            'descripcionRango'          => $request->descripcion,
            'puntajePersonalRango'      => $request->puntaje_personal,
            'puntajeGrupalRango'        => $request->puntaje_grupal,
            'puntajeDirectosRango'      => $request->puntaje_directos,
            'activosFranquiciadosRango' => $request->activos_franquiciados
        ]);
        return redirect(route('admin.ranks.index'));
    }

    public function destroy($id){
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroRangos(){
        $numero_rangos = Rank::count();
        return $numero_rangos;
    }
}