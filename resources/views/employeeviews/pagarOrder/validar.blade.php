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
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <h1 class="text-success">El pago se realizo con Exito!</h1>
                <a href="{{route('employee.orders.ordersSolicitados')}}" class="btn btn-primary btn-sm">Continuar con el siguiente pedido</a>
            </div>
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