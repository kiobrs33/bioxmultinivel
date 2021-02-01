@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Ver Pedido</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> Biox E.I.R.L
                            <small class="float-right">Date: {{$orden[0][0]->fechaPedido}}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        De
                        <address>
                            <strong>Biox E.I.R.L</strong><br>
                            Av. Miraflores 123<br>
                            <b>Telefono:</b> (804) 123-5432<br>
                            <b>Correo:</b> biox@gmail.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        Para
                        <address>
                            <strong>{{$orden[0][0]->nombresSocio.' '.$orden[0][0]->apellidoPaternoSocio.' '.$orden[0][0]->apellidoMaternoSocio }}
                            </strong><br>
                            <b>Telefono: </b> {{$orden[0][0]->telefonoSocio}}<br>
                            <b>Correo: </b> {{$orden[0][0]->correoSocio}}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Pedido ID: </b>{{$orden[0][0]->codigoPedido}}<br>
                        <b>Fecha de Pago: </b>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="filasTable">Producto</th>
                                    <th class="filasTable">Cantidad</th>
                                    <th class="filasTable">Puntos</th>
                                    <th class="filasTable">Subtotal Puntos</th>
                                    <th class="filasTable">Precio</th>
                                    <th class="filasTable">Subtotal Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orden[1] as $detalle)
                                <tr>
                                    <td class="filasTable">{{$detalle->nombre_producto}}</td>
                                    <td class="filasTable">{{$detalle->cantidadDetallePedido}}</td>
                                    <td class="filasTable">{{$detalle->puntosDetallePedido}}</td>
                                    <td class="filasTable">{{$detalle->subtotalPuntosDetallePedido}}</td>
                                    <td class="filasTable">{{$detalle->precioDetallePedido}}</td>
                                    <td class="filasTable">{{$detalle->subtotalPrecioDetallePedido}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p>Aqui se muestra a detalle el su pedido!</p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{$orden[0][0]->subtotalPedido}}</td>
                                </tr>
                                <tr>
                                    <th>Impuesto %</th>
                                    <td>{{$orden[0][0]->impuestoPedido}}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{$orden[0][0]->totalPedido}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{route('partner.orders.index')}}" class="btn btn-danger btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>

@endsection