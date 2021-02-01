@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Perfil</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background: url('/adminlte/dist/img/photo1.png') center 68%;">
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="/adminlte/dist/img/user3-128x128.jpg" alt="User Avatar">
                </div>
                <div class="mt-5">
                    <h5 class="text-center">
                        {{$socio->nombresSocio.' '.$socio->apellidoPaternoSocio.' '.$socio->apellidoMaternoSocio}}
                    </h5>
                    <h6 class="text-center text-secondary">Rango: Sin Rango</h6>
                    <h6 class="text-center text-secondary">Codigo: {{$socio->usernameSocio}}</h6>
                </div>
                <div class="card-footer pt-3">
                    <a href="{{route('partner.partners.index')}}" class="btn bg-gradient-danger btn-xs btn-block">
                        <i class="fas fa-arrow-left"></i> Atras
                    </a>
                </div>
            </div>

        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-general" data-toggle="pill" href="#content-general" role="tab" aria-controls="content-general" aria-selected="true">General</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="content-general" role="tabpanel" aria-labelledby="tab-general">
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Informacion</h6>
                                    <ul>
                                        <li class="li-sin-signo"><i class="fas fa-phone"></i> {{$socio->telefonoSocio}}
                                        </li>
                                        <li class="li-sin-signo">
                                            <i class="fas fa-envelope"></i>
                                            {{$socio->correoSocio}}
                                        </li>
                                        <li class="li-sin-signo">
                                            <i class="far fa-address-card"></i> {{$socio->dniSocio}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Colocacion</h6>
                                    <ul>
                                        <li class="li-sin-signo">Patrocinador:
                                            <span class="text-blue" style="text-transform: uppercase">
                                                {{$socio->nombresLider.' '.$socio->apellidoPaternoLider.' '.$socio->apellidoMaternoLider}}
                                            </span>
                                        </li>
                                        <li class="li-sin-signo">Fecha de Inscripcion:
                                            <b>{{$socio->fechaInscripcion}}</b></li>
                                    </ul>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Direccion</h6>
                                    <ul>
                                        <li class="li-sin-signo">
                                            <i class="fas fa-home"></i> {{$socio->direccionSocio}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Acciones</h6>
                                    <ul>
                                        <li class="li-sin-signo">
                                            <i class="fas fa-sitemap"></i>
                                            <a href="{{route('partner.partners.tree-partners',$socio->slugSocio)}}">Ver
                                                gráfica de linea
                                                descendiente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PEDIDOS -->
            <div class="card">
                <div class="card-header">Pedidos del Socio {{$socio->idSocio}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="orders" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="filasTable">ID</th>
                                    <th class="filasTable">Codigo</th>
                                    <th class="filasTable">Costo Total</th>
                                    <th class="filasTable">Puntos Total</th>
                                    <th class="filasTable">Fecha</th>
                                    <th class="filasTable">Estado</th>
                                </tr>
                            </thead>
                            
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
        $('#orders').DataTable({
            // Consultando datos con AJAX
            "processing": true,
            "serverSide": true,
            "ajax": "{{url('partner/partners/dataOrdersPartner/'.$socio->idSocio)}}",
            "columns": [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'codigoPedido',
                    name: 'codigoPedido'
                },
                {
                    data: 'totalPedido',
                    name: 'totalPedido'
                },
                {
                    data: 'puntosTotalPedido',
                    name: 'puntosTotalPedido'
                },
                {
                    data: 'fechaPedido',
                    name: 'fechaPedido'
                },
                {
                    data: 'estadoPedido',
                    name: 'estadoPedido'
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