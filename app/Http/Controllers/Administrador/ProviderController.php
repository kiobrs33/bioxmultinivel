<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Administrador\ProviderRequest;
use biox2020\Provider;

use Maatwebsite\Excel\Facades\Excel;
use biox2020\Exports\ProvidersExport;

class ProviderController extends Controller
{
    // Funcion para mostrar la Vista Index
    public function index(){
        return view('adminviews.providers.index');
    }

    // Funcion para Consultar Datos de la Tabla Proveedores
    public function indexApi(){
        return datatables(Provider::query())
        ->setRowClass('filasTable')
        ->editColumn('slugProveedor', 'adminviews.providers.actions')
        ->rawColumns(['slugProveedor'])
        ->toJson();
    }

    // Funcion para mostrar la El Formulario de Proveedores
    public function create(){
        return view('adminviews.providers.create');
    }

    // Funcion para guardar el Nuevo Proveedor
    public function store(ProviderRequest $request){
        Provider::guardarProveedor($request);
        return redirect(route('admin.providers.index'));
    }

    // Funcion para mostrar Informacion del Proveedor
    public function show($slug){
        $proveedor = Provider::where('slugProveedor',$slug)->first();
        return view('adminviews.providers.show', compact('proveedor'));
    }

    // Funcion para mostar Formulario con la informacion del Proveedor
    public function edit($slug){
        $proveedor = Provider::where('slugProveedor',$slug)->first();
        return view('adminviews.providers.edit', compact('proveedor'));
    }

    // Funcion para Actualizar datos en la Base de datos
    public function update(ProviderRequest $request){
        Provider::actualizarProveedor($request);
        return redirect(route('admin.providers.index'));
    }

    public function destroy($id){
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroProveedores(){
        $numero_proveedores = Provider::count();
        return $numero_proveedores;
    }


    public function proveedoresExcel(){
        return Excel::download(new ProvidersExport, 'proveedores-list.xlsx');
    }
}