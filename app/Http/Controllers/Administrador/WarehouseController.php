<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Administrador\WarehouseRequest;
use biox2020\Warehouse;

class WarehouseController extends Controller{
    // Variable para los tipos de ALMACENES   
    public $tipos_almacenes = array('insumos','productos');

    // Funcion para mostrar Lista de Almacenes
    public function index(){
        return view('adminviews.warehouses.index');
    }

    // Funcion para Consultar Datos de la Tabla WAREHOUSES
    public function indexApi(){
        return datatables(Warehouse::query())
        ->setRowClass('filasTable')
        ->editColumn('slugAlmacen','adminviews.warehouses.actions')
        ->rawColumns(['slugAlmacen'])
        ->toJson();
    }

    // Funcion para mostrar formulario 
    public function create(){
        $tipos_almacenes =  $this->tipos_almacenes;
        return view('adminviews.warehouses.create', compact('tipos_almacenes'));
    }

    // Funcion para guardar los datos del nuevo almacen
    public function store(WarehouseRequest $request){
        Warehouse::create([
            'nombreAlmacen'     => $request->nombre,
            'direccionAlmacen'  => $request->direccion,
            'tipoAlmacen'       => $request->tipo,
            'slugAlmacen'       => str_random(10)
        ]);
        return redirect(route('admin.warehouses.index'));
    }

    // Funcion para mostrar informacion del Almacen
    public function show($slug){ 
        $almacen = Warehouse::where('slugAlmacen',$slug)->first();
        return view('adminviews.warehouses.show', compact('almacen'));
    }

    // Funcion para mostrrar Formulario con la informacion del Almacen
    public function edit($slug){
        $almacen = Warehouse::where('slugAlmacen',$slug)->first();
        $tipos_almacenes =  $this->tipos_almacenes;
        return view('adminviews.warehouses.edit', compact('almacen','tipos_almacenes'));
    }

    // Funcion para actualizar datos del Almacen
    public function update(WarehouseRequest $request){
        Warehouse::where('id',$request->id_almacen)->update([
            'nombreAlmacen'     => $request->nombre,
            'direccionAlmacen'  => $request->direccion,
            'tipoAlmacen'       => $request->tipo,
        ]);
        return redirect(route('admin.warehouses.index'));
    }

    public function destroy($id){
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroAlmacenes(){
        $numero_almacenes = Warehouse::count();
        return $numero_almacenes;
    }
    
    public function almacenes(){
        $almacenes = Warehouse::all();
        return json_decode($almacenes);
    }
}