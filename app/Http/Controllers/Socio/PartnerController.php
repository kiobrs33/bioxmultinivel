<?php

namespace biox2020\Http\Controllers\Socio;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;

use biox2020\Partner;
use biox2020\Order;

class PartnerController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('partnerviews.partners.list-partners');
    }

    // Funcion para Consultar Datos de la Tabla SOCIOS
    public function listPartners(){
        $slug_socio = Auth()->user()->Socio->slugSocio;
        return Partner::listaSocios($slug_socio);
    }

    public function OrdersPartner($idSocio){
        $ordenes = Order::where('partners_id',$idSocio);

        return datatables()
        ->eloquent($ordenes)
        // ->editColumn('slugSocio','partnerviews.inscriptions.actions')
        // ->rawColumns(['slugSocio'])
        ->toJson();
        
    }

    public function show($slug){ 
        $socio = Partner::verSocio($slug);
        // dd($socio);
        // dd($ordenes);
        // dd($socio);
        return view('partnerviews.partners.show', compact('socio'));
    }

    // Funcion para ver ARBOL de Socios - TREE PARTNERS
    public function showArbol($slug){
        $misSocios = Partner::arbolSocios($slug);
        // dd($misSocios);
        return view('partnerviews.partners.tree-partners', compact('misSocios'));
    }

    
}