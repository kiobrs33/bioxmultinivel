@extends('partnerviews.containerOrganization')
@section('contenidoInscription')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="inscriptions" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th width="30px" class="filasTable">ID</th>
                        <th class="filasTable">Nombres</th>
                        <th class="filasTable">Apellidos</th>
                        <th class="filasTable">Correo</th>
                        <th class="filasTable">Dni</th>
                        <th class="filasTable">Fecha registro</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#inscriptions').DataTable({
        // Consultando datos con AJAX
        "processing": true,
        "serverSide": true,
        "ajax": "{{url('partner/inscriptions/dataInscriptions')}}",
        "columns": [{
                data: 'id',
                name: 'i.id'
            },
            {
                data: 'nombresSocio',
                name: 'p2.nombresSocio'
            },
            {
                data: 'apellidoPaternoSocio',
                name: 'p2.apellidoPaternoSocio'
            },
            {
                data: 'email',
                name: 'u2.email'
            },
            {
                data: 'dniSocio',
                name: 'p2.dniSocio'
            },
            {
                data: 'fechaInscripcion',
                name: 'i.fechaInscripcion'
            },
            {
                data: 'slugSocio',
                name: 'p2.slugSocio'
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