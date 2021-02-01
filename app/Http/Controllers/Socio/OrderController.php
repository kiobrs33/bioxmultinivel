<?php

namespace biox2020\Http\Controllers\Socio;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;

use biox2020\Http\Requests\OrderRequest;

use biox2020\Product;
use biox2020\Order;
use biox2020\Inscription;

class OrderController extends Controller
{
    

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index($estado = ''){
        $id_socio = Auth()->user()->Socio->id;
        
        if($estado == ''){
            $ordenes = Order::where('partners_id',$id_socio)
            ->get();
        }else{
            $ordenes = Order::where('partners_id',$id_socio)
            ->where('estadoPedido',$estado)
            ->get();
        }

        return view('partnerviews.orders.index', compact('ordenes'));
    }

    public function orders(){
        return view('partnerviews.orders.tableOrders');
    }

    public function create(){
        $productos = Product::all();
        return view('partnerviews.orders.create', compact('productos'));
    }

    public function store(OrderRequest $request){
        // dd($request);
        Order::guardarOrden($request);
        return redirect(route('partner.orders.index'));   
    }

    public function show($slug){ 
        $orden = Order::verOrden($slug);
        // dd($orden);
        return view('partnerviews.orders.show', compact('orden'));
    }

    public function edit($slug)
    {
        
    }

    public function update(CategorieRequest $request)
    {
        
    }

    public function destroy($id)
    {
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function NumeroSeguidores(){
        $id_socio = Auth()->user()->socio->id;
        $res = Inscription::where('partners_id',$id_socio)->count();
    }

    public function NumeroPuntos(){
    }

    public function NumeroInscripciones(){
        $id_socio = Auth()->user()->socio->id;
        $res = Inscription::where('partners_id',$id_socio)->count();
    }

    public function NumeroPedidos(){
        $id_socio = Auth()->user()->socio->id;
        $res = Orders::where('partners_id',$id_socio)
        ->where('estadoPedido','entregado')
        ->count();
    }
}