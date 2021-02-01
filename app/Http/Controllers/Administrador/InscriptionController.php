<?php

namespace biox2020\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use biox2020\Http\Controllers\Controller;

use biox2020\Http\Requests\InscriptionRequest;

use biox2020\Inscription;
use biox2020\Rank;
use biox2020\Product;
use biox2020\Package;

class InscriptionController extends Controller
{
    public $ciudades = array(
        'Amazonas',
        'Ancash',
        'Apurimac',
        'Arequipa',
        'Ayacucho',
        'Cajamarca',
        'Callao',
        'Cusco',
        'Huancavelica',
        'Huanuco',
        'Ica',
        'Junin',
        'La Libertad',
        'Lambayeque',
        'Lima',
        'Loreto',
        'Madre de Dios',
        'Moquegua',
        'Pasco',
        'Piura',
        'Puno',
        'San Martin',
        'Tacna',
        'Tumbes',
        'Ucayali'
    );
    
    public function index()
    {
        $inscripciones = Inscription::orderBy('id','DESC')->paginate(10);

        return view('adminviews.inscriptions.index', compact('inscripciones'));
    }

    public function create()
    {
        $ciudades = $this->ciudades;
        $codigo_aleatorio = str_random(6);
        $rangos = Rank::all();
        $productos = Product::all();
        $paquetes = Package::all();
        return view('adminviews.inscriptions.create', compact('rangos','codigo_aleatorio','ciudades','productos','paquetes'));
    }

    public function store(PackageRequest $request)
    {
        // Package::create([
        //     'nombre_paquete'    => $request->nombre_paquete,
        //     'puntos_paquete'    => $request->puntos_paquete,
        //     'slug'              => str_random(10)
        // ]);

        // return redirect(route('admin.packages.index'));
    }

    public function show($slug)
    { 
        // $paquete = Package::where('slug',$slug)->first();
        // return view('adminviews.packages.show', compact('paquete'));
    }

    public function edit($slug)
    {
        // $paquete = Package::where('slug',$slug)->first();
        // return view('adminviews.packages.edit', compact('paquete'));
    }

    public function update(PackageRequest $request)
    {
        // Package::where('slug',$request->slug_paquete)
        // ->update([
        //     'nombre_paquete'    => $request->nombre_paquete,
        //     'puntos_paquete'    => $request->puntos_paquete
        // ]);

        // return redirect(route('admin.packages.index'));
    }

    public function destroy($id)
    {
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroPaquetes(){
        $numero_inscripciones = Inscription::count();
        return $numero_inscripciones;
    }

    public function Paquetes(){
        $paquetes = Package::all();
        return $paquetes;
    }
}