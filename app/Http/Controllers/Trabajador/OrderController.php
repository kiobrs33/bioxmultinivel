<?php

namespace biox2020\Http\Controllers\Trabajador;

use Illuminate\Http\Request;
use biox2020\Http\Controllers\Controller;
use biox2020\Http\Requests\Trabajador\ValidarPagoOrderRequest;


use biox2020\Product;
use biox2020\Order;
use biox2020\Inscription;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function ordersSolicitados()
    {
        return view('employeeviews.orders.ordersSolicitados');
    }

    public function ordersEntregados()
    {
        return view('employeeviews.orders.ordersEntregados');
    }

    public function ordersCancelados()
    {
        return view('employeeviews.orders.ordersCancelados');
    }

    public function ordersAceptados()
    {
        return view('employeeviews.orders.ordersAceptados');
    }



    public function updateAceptarOrder($slugPedido)
    {

        $pedido =  Order::where('slugPedido', $slugPedido)->first();

        $pedido->estadoPedido = 'aceptado';
        $pedido->saved();

        return redirect(route('partner.orders.index'));
    }

    public function showOrderEntregado($slugPedido)
    {
        $data = Order::verOrdenEmployee($slugPedido);
        $order = $data[0];
        $detailsOrder = $data[1];
        return view('employeeviews.orders.showOrderEntregado', compact('order', 'detailsOrder'));
    }

    public function showOrderCancelado($slugPedido)
    {
        $data = Order::verOrdenEmployee($slugPedido);
        $order = $data[0];
        $detailsOrder = $data[1];
        return view('employeeviews.orders.showOrderCancelado', compact('order', 'detailsOrder'));
    }

    public function showOrderSolicitado($slugPedido)
    {
        $data = Order::verOrdenEmployee($slugPedido);
        $order = $data[0];
        $detailsOrder = $data[1];
        return view('employeeviews.orders.showOrderSolicitado', compact('order', 'detailsOrder'));
    }

    public function showOrderAceptado($slugPedido)
    {
        $data = Order::verOrdenEmployee($slugPedido);
        $order = $data[0];
        $detailsOrder = $data[1];
        return view('employeeviews.orders.showOrderAceptado', compact('order', 'detailsOrder'));
    }

    public function pagarOrder($slugPedido)
    {
        $data = Order::verOrdenEmployee($slugPedido);
        $order = $data[0];
        $detailsOrder = $data[1];
        return view('employeeviews.pagarOrder.montoPagar', compact('order', 'detailsOrder'));
    }

    public function validarPagoOrder(ValidarPagoOrderRequest $request)
    {
        Order::where('slugPedido', $request->slug_pedido)
            ->update([
                'numeroComprobantePedido'  => $request->comprobante_cliente,
                'estadoPedido' => 'entregado',
            ]);

        return view('employeeviews.pagarOrder.validar');
    }

    public function aceptarOrder(Request $request)
    {
        // dd($request->slug_pedido);
        Order::where('slugPedido', $request->slug_pedido)
            ->update([
                'estadoPedido' => 'aceptado',
            ]);

        return redirect(route('employee.orders.ordersAceptados'));
    }

    public function cancelarOrder(Request $request)
    {
        // dd($request->slug_pedido);
        Order::where('slugPedido', $request->slug_pedido)
            ->update([
                'estadoPedido' => 'cancelado',
            ]);

        return redirect(route('employee.orders.ordersCancelados'));
    }

    public function update(CategorieRequest $request)
    {
    }

    public function destroy($id)
    {
        //
    }

    //Funciones Especiales para JAVASCRIPT
    public function dataTableOrdersSolicitados()
    {
        $orders = Order::where('estadoPedido', 'solicitado');
        return datatables()
            ->eloquent($orders)
            ->editColumn('slugPedido', 'employeeviews.orders.actionsOrderSolicitado')
            ->rawColumns(['slugPedido'])
            ->toJson();
    }

    public function dataTableOrdersAceptados()
    {
        $orders = Order::where('estadoPedido', 'aceptado');
        return datatables()
            ->eloquent($orders)
            ->editColumn('slugPedido', 'employeeviews.orders.actionsOrderAceptado')
            ->rawColumns(['slugPedido'])
            ->toJson();
    }

    public function dataTableOrdersCancelados()
    {
        $orders = Order::where('estadoPedido', 'cancelado');
        return datatables()
            ->eloquent($orders)
            ->editColumn('slugPedido', 'employeeviews.orders.actionsOrderCancelado')
            ->rawColumns(['slugPedido'])
            ->toJson();
    }

    public function dataTableOrdersEntregados()
    {
        $orders = Order::where('estadoPedido', 'entregado');
        return datatables()
            ->eloquent($orders)
            ->editColumn('slugPedido', 'employeeviews.orders.actionsOrderEntregado')
            ->rawColumns(['slugPedido'])
            ->toJson();
    }
}
