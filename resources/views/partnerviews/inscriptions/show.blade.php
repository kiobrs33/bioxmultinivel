@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">

            <div class="col-auto">
                <!-- <a href="" class="btn btn-danger btn-sm btn-block"><i class="fas fa-arrow-left"></i> Atras</a> -->
                <h1>Informacion de la Inscripcion</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center text-lightblue mb-4">{{$insDataSocio->usernameSocio}}</h4>
                            <div class="text-center">
                                <img class=" profile-user-img img-fluid img-circle" src="/images/imagenVacia.png"
                                    alt="User profile picture">
                            </div>
                            <br>
                            <a href="{{route('partner.inscriptions.index')}}"
                                class="btn bg-gradient-danger btn-xs btn-block">
                                <i class="fas fa-arrow-left"></i> Atras
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-lightblue mb-4"><i class="fas fa-user-alt"></i> Informacion personal</h4>
                            <div class="row">
                                <div class="col-sm-6 invoice-col">
                                    <b>Nombres :</b> {{$insDataSocio->nombresSocio}}<br>
                                    <b>Apellido Paterno :</b> {{$insDataSocio->apellidoPaternoSocio}}<br>
                                    <b>Apellido Materno :</b> {{$insDataSocio->apellidoMaternoSocio}}
                                </div>
                                <div class="col-sm-6 invoice-col">
                                    <b>Fecha nacimiento :</b> {{$insDataSocio->fechaNacimientoSocio}}<br>
                                    <b>Sexo :</b> {{$insDataSocio->sexoSocio}}<br>
                                    <b>Dni :</b> {{$insDataSocio->dniSocio}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 invoice-col">
                                    <b>Direccion :</b> {{$insDataSocio->direccionSocio}}<br>
                                    <b>Pais :</b> {{$insDataSocio->paisSocio}}
                                </div>
                                <div class="col-sm-6 invoice-col">
                                    <b>Departamento :</b> {{$insDataSocio->departamentoSocio}}<br>
                                    <b>Provincia :</b> {{$insDataSocio->provinciaSocio}}<br>
                                    <b>Distrito :</b> {{$insDataSocio->distritoSocio}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 invoice-col">
                                    <b>Correo :</b> {{$insDataSocio->correoSocio}}<br>
                                    <b>Telefono :</b> {{$insDataSocio->telefonoSocio}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-lightblue mb-4"><i class=" fas fa-briefcase"></i> Detalles de la
                        inscripcion</h4>
                    <div class="row">
                        <div class="col-sm-6 invoice-col">
                            <b>Fecha de Inscripcion :</b> {{$insDataSocio->fechaInscripcion}}<br>
                        </div>
                        <div class="col-sm-6 invoice-col">
                            <b>Paquete :</b> {{($insPaquete) ? $insPaquete->nombrePaquete : 'No tiene'}}<br>
                        </div>
                    </div>
                    <br>
                    @if($insDetallesOrden)
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Codigo #</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Puntos</th>
                                    <th style="width:16%">Subtotal S/.</th>
                                    <th style="width:16%">Subtotal puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($insDetallesOrden as $ins)
                                <tr>
                                    <td>{{$ins->codigoProducto}}</td>
                                    <td>{{$ins->nombreProducto}}</td>
                                    <td>{{$ins->cantidadDetallePedido}}</td>
                                    <td>S/{{$ins->precioDetallePedido}}</td>
                                    <td>{{$ins->puntosDetallePedido}}</td>
                                    <td>S/{{$ins->subtotalPrecioDetallePedido}}</td>
                                    <td>{{$ins->subtotalPuntosDetallePedido}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>S/{{$insLibre->subtotalPedido}}</td>
                                    </tr>
                                    <tr>
                                        <th>Impuesto (1.3%)</th>
                                        <td>S/{{$insLibre->impuestoPedido}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$/{{$insLibre->totalPedido}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Puntos:</th>
                                        <td>{{$insLibre->puntosTotalPedido}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
@endsection