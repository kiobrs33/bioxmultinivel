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
<section class="container p-3">
    <div class="row">
        <div class="col-12">
        <form action="{{route('employee.orders.validarPagoOrder')}}" method="POST">
        {{ csrf_field() }}

        <input type="hidden" value="{{$order[0]->slugPedido}}" name="slug_pedido">

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

            <div class="row mt-3">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Monto a pagar:</p>
                <br>
                <h1 class="text-danger text-center" id="totalPedido">S/.{{$order[0]->totalPedido}}</h1>
                <input type="hidden" value="{{$order[0]->totalPedido}}" id="totalCliente">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Atendido</label>              
                            <input type="text" name="monto_cliente" class="form-control inputCentrado"
                                                        id="monto_cliente" value="{{old('monto_cliente')}}">
                                                    {!!$errors->first('monto_cliente','<span
                                                        class="is-invalid text-danger">:message</span>')!!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vuelto</label>              
                            <input type="text" name="vuelto_cliente" class="form-control inputCentrado"
                                                        id="vuelto_cliente" value="0" disabled>
                                                    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Numero del comprobante</label>              
                            <input type="text" name="comprobante_cliente" class="form-control inputCentrado"
                                                        id="comprobante_cliente" value="{{old('comprobante_cliente')}}">
                                                    {!!$errors->first('comprobante_cliente','<span
                                                        class="is-invalid text-danger">:message</span>')!!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Data</p>

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
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">    
                    <button type="submit" class="btn btn-primary float-right btn-sm">validar</button>
                </div>
            </div>
            <!-- /.row -->            
        </div>
            
        </form> 
        </div> 
    </div>
</section>
<script>  
    let vuelto = 0;
    $(document).on("keyup", "#monto_cliente", function () {
        let montoCliente = $("#monto_cliente").val();
        let vueltoCliente = $("#vuelto_cliente").val();
        let total = $("#totalCliente").val();
        vuelto = total - montoCliente;
        $("#vuelto_cliente").val(vuelto< 0 ? vuelto*-1 : vuelto);       
    }); 
</script>
@endsection