<?php

namespace biox2020\Http\Controllers\Socio;

use Illuminate\Http\Request;

use biox2020\Http\Controllers\Controller;
//Para la fecha
use Carbon\carbon;
//Importando DB
use Illuminate\Support\Facades\DB;

use biox2020\Inscription;
use biox2020\Order;

class ExtrasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function NumeroInscripciones(){
        $id_socio = Auth()->user()->socio->id;
        $res = Inscription::where('partners_id',$id_socio)->count();
        return $res;
    }

    public function NumeroSeguidores(){
        $id_socio = Auth()->user()->socio->id;
        $res = Inscription::where('partners_id',$id_socio)->count();
        return $res;
    }

    public function NumeroPedidos(){
        $id_socio = Auth()->user()->socio->id;
        $res = Order::where('partners_id',$id_socio)->count();
        return $res;

        // $primerDiaDelMes = Carbon::now()->startOfMonth()->toDateString();
        // $ultimoDiaDelMes = Carbon::now()->endOfMonth()->toDateString();

        // $mesDeAhora = Carbon::now()->month;
    


        // BONO POR LAS INSCRRPCIONES POR PAQUETES
        // $rpt = DB::table('inscriptions as i')
        // ->join('orders as o','o.id','=','i.orders_id')
        // ->join('packages as p','p.id','=','i.packages_id')
        // ->where('o.estadoPedido','solicitado')// cambiar
        // ->whereMonth('i.fechaInscripcion',$mesDeAhora)
        // ->sum('p.bonoPaquete');

        // dd($rpt);
    }

    public function PuntosSocio(){
        // Obteniendo el NUMERO del mes ACTUAL
        $mesDeAhora = Carbon::now()->month;
        $id_socio = Auth()->user()->socio->id;
        
        // PUNTOS DEL SOCIO LOGUEADO POR MES
        $rpt = DB::table('orders as o')
        ->join('partners as p','p.id','=','o.partners_id')
        ->where('p.id',$id_socio)
        ->where('estadoPedido','solicitado')// cambiar
        ->whereMonth('fechaPedido',$mesDeAhora)
        ->sum('puntosTotalPedido');

        return $rpt;
    }
}