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
                            <h5><b>Almacenes</b></h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('admin.warehouses.create')}}" class="btn btn-success btn-block btn-sm">
                                <i class="fas fa-plus-circle"></i> NUEVO ALMACEN
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="warehouses" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="30px" class="filasTable">ID</th>
                                    <th width="200px" class="filasTable">Nombre</th>
                                    <th class="filasTable">Direccion</th>
                                    <th class="filasTable">Tipo</th>
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
    $('#warehouses').DataTable({
        // Consultando datos con AJAX
        "serverSide": true,
        "ajax": "{{url('api/warehouses')}}",
        "columns": [{
                data: 'id'
            },
            {
                data: 'nombreAlmacen'
            },
            {
                data: 'direccionAlmacen'
            },
            {
                data: 'tipoAlmacen'
            },
            {
                data: 'slugAlmacen',
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