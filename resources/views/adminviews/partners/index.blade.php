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
                            <h5><b>Categorias</b></h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('admin.partners.create')}}" class="btn btn-success btn-block btn-sm">
                                <i class="fas fa-plus-circle"></i> NUEVO SOCIO
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="partners" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="30px" class="filasTable">ID</th>
                                    <th class="filasTable">Codigo</th>
                                    <th class="filasTable">Nombres</th>
                                    <th class="filasTable">Apellido Paterno</th>
                                    <th class="filasTable">Apellido Materno</th>
                                    <th class="filasTable">Dni</th>
                                    <th class="filasTable">Telefono</th>
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
    $('#partners').DataTable({

        // Consultando datos con AJAX
        "serverSide": true,
        "ajax": "{{url('api/partners')}}",
        "columns": [{
                data: 'id'
            },
            {
                data: 'codigoSocio'
            },
            {
                data: 'nombresSocio'
            },
            {
                data: 'apellidoPaternoSocio'
            },
            {
                data: 'apellidoMaternoSocio'
            },
            {
                data: 'dniSocio'
            },
            {
                data: 'telefonoSocio'
            },
            {
                data: 'slugSocio',
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