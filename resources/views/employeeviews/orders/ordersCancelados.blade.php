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
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="orders" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th >Codigo</th>
                            <th>Fecha de pedido</th>
                            <th>Fechan de entrega</th>
                            <th>Socio ID</th>
                            <th>Estado</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#orders').DataTable({
        // Consultando datos con AJAX
        "processing": true,
        "serverSide": true,
        "ajax": "{{url('employee/orders/dataTableOrdersCancelados')}}",
        "columns": [{
                data: 'codigoPedido',
                name: 'codigoPedido'
            },
            {
                data: 'fechaPedido',
                name: 'fechaPedido'
            },
            {
                data: 'fechaEntregaPedido',
                name: 'fechaEntregaPedido'
            },
            {
                data: 'partners_id',
                name: 'partners_id'
            },
            {
                data: 'estadoPedido',
                name: 'estadoPedido'
            },
            {
                data: 'slugPedido',
                name: 'slugPedido'
            },
           
        ],
        // Traduciendo todas las ETIQUETAS DE LA TABLA EN ESPAÑOL
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando <b>_END_</b> registros de un total de <b>_TOTAL_</b> registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "<b>Buscar:</b>",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "<i class='fa fa-angle-right'></i>",
                "sPrevious": "<i class='fa fa-angle-left'></i>"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "responsive": true
    });
});
</script>
@endsection