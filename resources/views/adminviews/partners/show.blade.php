@extends('layouts.appAdmin')
@section('contenido')
<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <img class="profile-user-img img-fluid img-circle" src="/images/imagenVacia.png"
                                alt="User profile picture">
                        </div>
                        <div class="col-lg-4">
                            <ul>
                                <li class="li-sin-signo">
                                    <h4>{{$socio->nombresSocio.' '.$socio->apellidoPaternoSocio.' '.$socio->apellidoMaternoSocio}}
                                    </h4>
                                </li>
                                <li class="li-sin-signo">
                                    <i class="fas fa-address-card"></i>
                                    Dni : <b>{{$socio->dniSocio}}</b></li>
                                <li class="li-sin-signo">
                                    <i class="fas fa-phone"></i>
                                    Telefono : <b>{{$socio->telefonoSocio}}</b></li>
                                <li class="li-sin-signo">
                                    <i class="fas fa-envelope"></i>
                                    Correo : <b>{{$socio->correoSocio}}</b>
                                </li>
                                <li class="li-sin-signo">
                                    <i class="fas fa-user-shield"></i>
                                    Codigo : <b>{{$socio->usernameSocio}}</b>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul>
                                <li class="li-sin-signo">
                                    <b>Direcciones</b>
                                </li>
                                <li class="li-sin-signo">
                                    <i class="fas fa-home"></i>
                                    {{$socio->direccionSocio}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-star"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Puntos</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-list-ul"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Inscripciones</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Socios Directos</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pedidos</span>
                    <span class="info-box-number">1,410</span>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-warning card-outline collapsed-card">
                <div class="card-header">
                    <b>SOCIOS DIRECTOS</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sociosDirectos" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="30px" class="filasTable">ID</th>
                                    <th class="filasTable">Nombres</th>
                                    <th class="filasTable">Apellido Paterno</th>
                                    <th class="filasTable">Apellido Materno</th>
                                    <th class="filasTable">Dni</th>
                                    <th class="filasTable">Telefono</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-info card-outline collapsed-card">
                <div class="card-header">
                    <b>PEDIDOS</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sociosDirectos" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="30px" class="filasTable">ID</th>
                                    <th class="filasTable">Nombres</th>
                                    <th class="filasTable">Apellido Paterno</th>
                                    <th class="filasTable">Apellido Materno</th>
                                    <th class="filasTable">Dni</th>
                                    <th class="filasTable">Telefono</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-success card-outline collapsed-card">
                <div class="card-header">
                    <b>INSCRIPCIONES</b>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sociosDirectos" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="30px" class="filasTable">ID</th>
                                    <th class="filasTable">Nombres</th>
                                    <th class="filasTable">Apellido Paterno</th>
                                    <th class="filasTable">Apellido Materno</th>
                                    <th class="filasTable">Dni</th>
                                    <th class="filasTable">Telefono</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
$(document).ready(function() {
    $('#sociosDirectos').DataTable({
        // Consultando datos con AJAX
        "serverSide": true,
        "ajax": "{{url('admin/partners/followers/'.$socio->slugSocio)}}",
        "columns": [{
                data: 'id'
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