<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Administrador\ProductRequest;
use biox2020\Categorie;
use biox2020\Warehouse;
use biox2020\Product;

use Maatwebsite\Excel\Facades\Excel;
use biox2020\Exports\ProductsExport;

class ProductController extends Controller
{
    // Array con Tipos de unidades
    public $unidades_medida = [
        'unidad',
        'kilogramo',
        'litro'
    ];

    // Funcion para mostrar la tabla de PRODUCTOS
    public function index(){
        return view('adminviews.products.index');
    }

    // Funcion para Consultar Datos de la Tabla Categories
    public function indexApi(){
        return datatables(Product::query())
        ->setRowClass('filasTable')
        ->editColumn('slugProducto','adminviews.products.actions')
        ->rawColumns(['slugProducto'])
        // Aqui se esta haciendo una SUBCONSULTA  para obtener nombre de la CATEGORIA DEL PRODUCTO
        ->editColumn('categories_id',function(Product $producto){
            $categoria = Categorie::where('id',$producto->categories_id)->first();
            return $categoria->nombreCategoria;
        })
        ->toJson();
    }

    // Funcion para mostrar formulario para el nuevo Producto
    public function create(){
        $categorias = Categorie::all();
        $almacenes  = Warehouse::all();
        $unidades_medida = $this->unidades_medida;
        return view('adminviews.products.create', compact('categorias','almacenes','unidades_medida'));
    }

    // Funcion para GUARDAR EL NUEVO PRODUCTO
    public function store(ProductRequest $request){
        Product::guardarProducto($request);
        return redirect(route('admin.products.index'));
    }

    // Funcion para mostrar datos del PRODUCTOS
    public function show($slug){ 
        $datos  = Product::verProducto($slug);
        $producto   = $datos["producto"][0];
        $stocks     = $datos["stocks"];
        return view('adminviews.products.show', compact('producto','stocks'));
    }

    // FUNCION - INCOMPLETA
    public function edit($slug){
        $datos  = Product::verProducto($slug);
        $producto   = $datos["producto"][0];
        $precios    = $datos["precios"];
        $stocks     = $datos["stocks"];

        $categorias = Categorie::all();
        $almacenes  = Warehouse::all();
        $unidades_medida = $this->unidades_medida;

        // dd($producto, $precios, $stocks);
        return view('adminviews.products.edit', compact('producto','precios','stocks','categorias','almacenes','unidades_medida'));
    }

    // FUNCION - INCOPLETA
    public function update(CategorieRequest $request){
    }

    public function destroy($id){
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroProductos(){
        $numero_productos = Product::count();
        return $numero_productos;
    }

    public function productsExcel(){
        return Excel::download(new ProductsExport, 'productos-list.xlsx');
    }
}