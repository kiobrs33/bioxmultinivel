<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Administrador\CategorieRequest;
use biox2020\Categorie;

class CategorieController extends Controller
{
    // Funcion para mostrar la vista de categorias
    public function index(){
        return view('adminviews.categories.index');
    }

    // Funcion para Consultar Datos de la Tabla Categories
    public function indexApi(){
        return datatables(Categorie::query())
        ->setRowClass('filasTable')
        ->editColumn('slugCategoria','adminviews.categories.actions')
        ->rawColumns(['slugCategoria'])
        ->toJson();
    }

    // Funcion para mostrar el formulario
    public function create(){
        return view('adminviews.categories.create');
    }

    // Funcion para guardar los datos
    public function store(CategorieRequest $request){
        Categorie::create([
            'nombreCategoria'    => $request->nombre,
            'slugCategoria'      => str_random(10)
        ]);

        return redirect(route('admin.categories.index'));
    }

    // Funcion para mostrar informacion de la Categoria
    public function show($slug){ 
        $categoria = Categorie::where('slugCategoria',$slug)->first();
        return view('adminviews.categories.show', compact('categoria'));
    }

    // Funcion para mostrar un formulario con datos de la Categoria
    public function edit($slug){
        $categoria = Categorie::where('slugCategoria',$slug)->first();
        return view('adminviews.categories.edit', compact('categoria'));
    }

    // Funcion para actualizar datos de la categoria
    public function update(CategorieRequest $request){
        Categorie::where('slugCategoria',$request->slug)
        ->update([
            'nombreCategoria'   => $request->nombre
        ]);

        return redirect(route('admin.categories.index'));
    }

    public function destroy($id){
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroCategorias(){
        $numero_categorias = Categorie::count();
        return $numero_categorias;
    }
}