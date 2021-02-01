@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h5><b>Proveedores</b></h5>
                </div>
                <div class="col-auto">
                    <a href="{{route('admin.providers.create')}}" class="btn btn-success btn-block btn-sm">
                        <i class="fas fa-plus-circle"></i> NUEVO PROVEEDOR
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{route('admin.providers.excel')}}" class="btn btn-primary btn-block btn-sm">
                    <i class="far fa-file-excel"></i> EXCEL
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="providers" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th width="30px" class="filasTable">ID</th>
                            <th class="filasTable">Razon Social</th>
                            <th class="filasTable">Ruc</th>
                            <th width="90px" class="filasTable">Telefono</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <br>
</div>

<script>
$(document).ready(function() {
    $('#providers').DataTable({

        // Consultando datos con AJAX
        "serverSide": true,
        "ajax": "{{url('api/providers')}}",
        "columns": [{
                data: 'id'
            },
            {
                data: 'razonSocialProveedor'
            },
            {
                data: 'rucProveedor'
            },
            {
                data: 'telefonoProveedor'
            },
            {
                data: 'slugProveedor',

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