@extends('layouts.appPartner')


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
    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <a href="{{route('partner.orders.index')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-clipboard-check"></i> Todas las ordenes
                </a>
                <a href="{{route('partner.orders.index', 'entregado')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-clipboard-check"></i> Ordenes entregadas
                </a>
                <a href="{{route('partner.orders.index', 'solicitado')}}"
                    class="list-group-item list-group-item-action">
                    <i class="fas fa-truck"></i> Ordenes en solicitadas
                </a>
                <a href="{{route('partner.orders.index', 'cancelado')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-times-circle"></i> Ordenes canceladas
                </a>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="filasTable">ID</th>
                                    <th class="filasTable">Fecha registro</th>
                                    <th class="filasTable">Total</th>
                                    <th class="filasTable">Fecha entrega</th>
                                    <th class="filasTable">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordenes as $orden)
                                <tr>
                                    <td class="filasTable">
                                        <a href="{{route('partner.orders.show', $orden->slugPedido)}}"
                                            class="btn btn-info btn-xs"><i class="far fa-eye"></i> Ver</a>
                                    </td>
                                    <td class="filasTable">{{$orden->id}}</td>
                                    <td class="filasTable">{{$orden->fechaPedido}}</td>
                                    <td class="filasTable">{{$orden->totalPedido}}</td>
                                    <td class="filasTable">{{$orden->fechaEntregaPedido}}</td>
                                    @if($orden->estadoPedido == 'solicitado')
                                    <td class="table-warning filasTable">{{$orden->estadoPedido}}</td>
                                    @elseif($orden->estadoPedido == 'entregado')
                                    <td class="table-success filasTable">{{$orden->estadoPedido}}</td>
                                    @elseif($orden->estadoPedido == 'cancelado')
                                    <td class="table-danger filasTable">{{$orden->estadoPedido}}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example1').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
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
        }
    });
});
</script>
@endsection