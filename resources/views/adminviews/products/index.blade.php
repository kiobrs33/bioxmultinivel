@extends('layouts.appAdmin')

@section('contenido')

<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h5><b>Productos</b></h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('admin.products.create')}}" class="btn btn-success btn-block btn-sm">
                                <i class="fas fa-plus-circle"></i> NUEVO PRODUCTO
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('admin.products.excel')}}" class="btn btn-primary btn-block btn-sm">
                            <i class="far fa-file-excel"></i> EXCEL
                        </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="categories" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="filasTable">ID</th>
                                    <th class="filasTable">Codigo</th>
                                    <th class="filasTable">Nombre</th>
                                    <th class="filasTable">Precio</th>
                                    <th class="filasTable">Categoria</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<script>
$(document).ready(function() {
    $('#categories').DataTable({

        // Consultando datos con AJAX
        "serverSide": true,
        "ajax": "{{url('api/products')}}",
        "columns": [{
                data: 'id'
            },
            {
                data: 'codigoProducto'
            },
            {
                data: 'nombreProducto'
            },
            {
                data: 'precioProducto'
            },
            {
                data: 'categories_id'
            },
            {
                data: 'slugProducto',
            }
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