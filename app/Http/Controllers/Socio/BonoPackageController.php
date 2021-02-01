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

class BonoPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lookBonoPackage()
    {
        // BONO POR LAS INSCRRPCIONES POR PAQUETES
        $mesDeAhora = Carbon::now()->month;
        $id_socio = Auth()->user()->socio->id;
        $bonoTotal = DB::table('inscriptions as i')
            ->join('orders as o', 'o.id', '=', 'i.orders_id')
            ->join('partners as s', 's.id', '=', 'i.partners_id')
            ->join('packages as p', 'p.id', '=', 'i.packages_id')
            ->where('s.id', $id_socio)
            ->where('o.estadoPedido', 'solicitado') // cambiar
            ->whereMonth('i.fechaInscripcion', $mesDeAhora)
            ->sum('p.bonoPaquete');

        // BONO RANGO
        $seguidores = DB::table('inscriptions as i')
            ->join('orders as o', 'o.id', '=', 'i.orders_id')
            ->join('partners as p', 'p.id', '=', 'i.partners_id')
            ->join('partners as p2', 'p2.id', '=', 'i.followers_id')
            ->where('p.id', $id_socio)
            ->where('o.estadoPedido', 'solicitado') // cambiar
            ->select('p2.id')
            ->get();

        // Para hallar los 3 activos
        $cont = 0;
        foreach ($seguidores as $item) {
            if ($cont < 4) {
                $puntos = DB::table('inscriptions as i')
                    ->join('orders as o', 'o.id', '=', 'i.orders_id')
                    ->join('partners as s', 's.id', '=', 'i.partners_id')
                    ->join('packages as p', 'p.id', '=', 'i.packages_id')
                    ->where('s.id', $item->id)
                    ->where('o.estadoPedido', 'solicitado') // cambiar
                    ->whereMonth('i.fechaInscripcion', $mesDeAhora)
                    ->sum('p.bonoPaquete');

                if ($puntos >= 50) {
                    dd($puntos);
                    $cont = $cont + 1;
                }
                break;
            }
        }

        // Para hallar los puntos
        $total_puntos_arbol = 0;
        foreach ($seguidores as $item) {
            for ($i = 1; $i <= 10; $i++) {
                echo $i;
            }
            $seguidores = DB::table('inscriptions as i')
                ->join('orders as o', 'o.id', '=', 'i.orders_id')
                ->join('partners as p', 'p.id', '=', 'i.partners_id')
                ->join('partners as p2', 'p2.id', '=', 'i.followers_id')
                ->where('p.id', $item->id)
                ->where('o.estadoPedido', 'solicitado') // cambiar
                ->select('p2.id')
                ->get();

            $puntos = DB::table('inscriptions as i')
                ->join('orders as o', 'o.id', '=', 'i.orders_id')
                ->join('partners as s', 's.id', '=', 'i.partners_id')
                ->join('packages as p', 'p.id', '=', 'i.packages_id')
                ->where('s.id', $item->id)
                ->where('o.estadoPedido', 'solicitado') // cambiar
                ->whereMonth('i.fechaInscripcion', $mesDeAhora)
                ->sum('p.bonoPaquete');

            $total_puntos_arbol = $total_puntos_arbol + $puntos;
        }

        // dd($seguidores);

        return view('partnerviews.bonos.bonoLookPackage', compact('bonoTotal'));
    }

    // public function lookBonoRango()
    // {
    //     $bonoTotal = DB::table('inscriptions as i')
    //         ->join('orders as o', 'o.id', '=', 'i.orders_id')
    //         ->join('partners as s', 's.id', '=', 'i.partners_id')
    //         ->join('partners as p', 'p.id', '=', 'i.followers_id')
    //         ->where('s.id', $id_socio)
    //         ->where('o.estadoPedido', 'solicitado') // cambiar
    //         ->get();
    // }
}
