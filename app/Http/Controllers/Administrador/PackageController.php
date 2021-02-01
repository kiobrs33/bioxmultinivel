<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use biox2020\Http\Controllers\Controller;

use biox2020\Http\Requests\Administrador\PackageRequest;

use biox2020\Package;
use biox2020\Product;

class PackageController extends Controller
{
    // Funcion para mostrar LISTA DE PAQUETES
    public function index(){
        return view('adminviews.packages.index');
    }

    // Funcion para Consultar Datos de la Tabla Categories
    public function indexApi(){
        return datatables(Package::query())
        ->setRowClass('filasTable')
        ->editColumn('slugPaquete','adminviews.packages.actions')
        ->rawColumns(['slugPaquete'])
        ->toJson();
    }

    // Funcion para mostrar FORMAULRIO DE CREAR PAQUEETE
    public function create(){
        return view('adminviews.packages.create');
    }

    // Funcion para ALMACENAR EL NUEVO PAQUETE
    public function store(PackageRequest $request){
        Package::guardarPaquete($request);
        return redirect(route('admin.packages.index'));
    }

    // Funcion para mostrar informacion del paquete
    public function show($slug){ 
        $datos = Package::informacionPaquete($slug);
        $paquete = $datos[0];
        $detallesPaquete = $datos[1];
        return view('adminviews.packages.show', compact('paquete','detallesPaquete'));
    }

    // Funcio Incopleta
    public function edit($slug){
        $paquete = Package::where('slug',$slug)->first();
        return view('adminviews.packages.edit', compact('paquete'));
    }

    // Funcion - INCOPLETA
    public function update(PackageRequest $request){
        Package::where('slug',$request->slug_paquete)
        ->update([
            'nombre_paquete'    => $request->nombre_paquete,
            'puntos_paquete'    => $request->puntos_paquete
        ]);

        return redirect(route('admin.packages.index'));
    }

    public function destroy($id){
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroPaquetes(){
        $numero_paquetes = Package::count();
        return $numero_paquetes;
    }

    // Funcion para listar PRODUCTO CON DATATABLE de formar Personalizada
    public function Productos(){
        return datatables(Product::query())
        ->setRowClass('filasTable')
        ->editColumn('id','<span class="id-producto">{{$id}}</span>')
        ->editColumn('nombreProducto','<span class="nombre-producto">{{$nombreProducto}}</span>')
        ->editColumn('precioProducto','<span class="precio-producto">{{$precioProducto}}</span>')
        ->editColumn('puntosProducto','<span class="puntos-producto">{{$puntosProducto}}</span>')
        ->editColumn('slugProducto','adminviews.packages.actionsProducto')
        ->rawColumns(['slugProducto','nombreProducto','precioProducto','puntosProducto','id'])
        ->toJson();
    }
}