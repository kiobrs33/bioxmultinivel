<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\PointRequest;
use biox2020\Point;

class PointController extends Controller
{
    
    public function index()
    {
        $rangos = Point::orderBy('id','DESC')->paginate(10);
        return view('adminviews.ranks.index', compact('rangos'));
    }

    public function create()
    {
        return view('adminviews.ranks.create');
    }

    public function store(RankRequest $request)
    {
        Rank::create([
            'nombre_rango'          => $request->nombre_rango,
            'descripcion'           => $request->descripcion_rango,
            'puntaje_personal'      => $request->puntaje_personal_rango,
            'puntaje_grupal'        => $request->puntaje_grupal_rango,
            'puntaje_directos'      => $request->puntaje_directos_rango,
            'activos_franquiciados' => $request->activos_franquiciados_rango,
            'slug'                  => str_random(10)
        ]);

        return redirect(route('admin.ranks.index'));
    }

    public function show($slug)
    { 
        $rango = Rank::where('slug',$slug)->first();
        return view('adminviews.ranks.show', compact('rango'));
    }

    public function edit($slug)
    {
        $rango = Rank::where('slug',$slug)->first();
        return view('adminviews.ranks.edit', compact('rango'));
    }

    public function update(RankRequest $request)
    {
        Rank::where('slug',$request->slug_rango)->update([
            'nombre_rango'          => $request->nombre_rango,
            'descripcion'           => $request->descripcion_rango,
            'puntaje_personal'      => $request->puntaje_personal_rango,
            'puntaje_grupal'        => $request->puntaje_grupal_rango,
            'puntaje_directos'      => $request->puntaje_directos_rango,
            'activos_franquiciados' => $request->activos_franquiciados_rango
        ]);

        return redirect(route('admin.ranks.index'));
    }

    public function destroy($id)
    {
        //
    }
}