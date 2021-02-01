<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use biox2020\Http\Controllers\Controller;

use biox2020\Http\Requests\Administrador\PartnerRequest;
use biox2020\Partner;
use biox2020\User;
// use biox2020\Rank;

class PartnerController extends Controller
{
    public $sexos = ['masculino','femenino'];

    // Funcion para mostrar para LISTA de socios
    public function index(){
        return view('adminviews.partners.index');
    }

    // Funcion para Consultar Datos de la Tabla PARTNERS
    public function indexApi(){
        return datatables(Partner::query())
        ->setRowClass('filasTable')
        ->editColumn('slugSocio','adminviews.partners.actions')
        ->editColumn('codigoSocio',function(Partner $socio){
            $rpt = User::where('id',$socio->users_id)->first();
            return $rpt->name;
        })
        ->rawColumns(['slugSocio'])
        ->toJson();
    }

    public function create(){
        $sexos = $this->sexos;
        return view('adminviews.partners.create', compact('sexos'));
    }

    public function store(PartnerRequest $request){
        Partner::guardarSocio($request);
        return redirect(route('admin.partners.index'));
    }

    public function show($slug){
        $socio = Partner::verSocio($slug);
        dd($socio);
        return view('adminviews.partners.show', compact('socio'));
    }

    public function edit($slug)
    {

    }

    public function update(PackageRequest $request)
    {
        
    }

    public function destroy($id)
    {
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroSocios(){
        $numero_socios = Partner::count();
        return $numero_socios;
    }

    public function SeguidoresDelSocio($slug){
        return Partner::seguidores($slug);
    }
}