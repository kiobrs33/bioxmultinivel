@extends('layouts.appEmployee')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Ordenes o Pedidos</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('contenido')
<section class="container">
    <div class="row mt-3">
        <div class="col-12">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Nota:</h5>
            Esta vista es para la confirmacion o cancelacion del pedido
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
            <div class="col-12">
                <h4>
                <i class="fas fa-globe"></i> Bioxmultinivel
                <small class="float-right">Fecha: {{$order[0]->fechaPedido}}</small>
                </h4>
            </div>
            <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row">
            <div class="col-sm-6">
                <h6>Cliente : <b>{{$order[0]->nombresSocio.' '.$order[0]->apellidoPaternoSocio.' '.$order[0]->apellidoMaternoSocio}}</b></h6>
                <h6>Codigo de usuario : <b>{{$order[0]->username}}</b></h6>
                <h6>Telefono : <b>{{$order[0]->telefonoSocio}}</b></h6>
                <h6>Correo : <b>{{$order[0]->correoSocio}}</b></h6>      
            </div>
            <div class="col-sm-6">
                <h6>Fecha de emision : <b>{{$order[0]->fechaPedido}}</b></h6>
                <h6>Fecha de entrega : <b>{{$order[0]->fechaEntregaPedido}}</b></h6>
                <br>
                <h6>ESTADO : <b>{{$order[0]->estadoPedido}}</b></h6>
            </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row mt-4">
            <div class="col-12 table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Producto</th>
                    <th>Puntos</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detailsOrder as $item)
                <tr>
                    <td>{{$item->cantidadDetallePedido}}</td>
                    <td>{{$item->precioDetallePedido}}</td>
                    <td>{{$item->nombreProducto}}</td>
                    <td>{{$item->puntosDetallePedido}}</td>
                    <td>{{$item->subtotalPuntosDetallePedido}}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mt-3">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Metodos de pagos:</p>
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Al realizar el pago no habra devolucion del dinero despues que el producto sea retirado de la tienda Biox.
                </p>
                <br>
                <h1 class="text-success">Pedido Entregado!</h1>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Amount Due 2/22/2014</p>

                <div class="table-responsive">
                <table class="table">
                    <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>S/.{{$order[0]->subtotalPedido}}</td>
                    </tr>
                    <tr>
                    <th>Impuesto</th>
                    <td>S/.{{$order[0]->impuestoPedido}}</td>
                    </tr>
                    <tr>
                    <th>Puntos totales:</th>
                    <td>{{$order[0]->puntosTotalPedido}}</td>
                    </tr>
                    <tr>
                    <th>Total:</th>
                    <td>S/.{{$order[0]->totalPedido}}</td>
                    </tr>
                </table>
                </div>
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
            <!-- <div class="col-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
                </button>
            </div> -->
            </div>
        </div>  
        </div>
    </div>
</section>

@endsection