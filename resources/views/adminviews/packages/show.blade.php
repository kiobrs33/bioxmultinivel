@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Paquete
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nombre Paquete</label>
                                <input type="text" name="nombre" class="form-control form-control-sm inputCentrado"
                                    value="{{$paquete->nombrePaquete}}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Puntos del Paquete</label>
                                <input type="text" name="puntos"
                                    class="form-control form-control-sm form-control-sm inputCentrado"
                                    value="{{$paquete->puntosPaquete}}" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- TABLA DETALLES DEL NUEVO PAQUETE -->
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="tableDetallesPaquete">
                            <thead>
                                <tr>
                                    <th class="filasTable">Nombre</th>
                                    <th class="filasTable">Puntos</th>
                                    <th class="filasTable">Precio</th>
                                    <th width="100px" class="filasTable">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detallesPaquete as $detalle)
                                <tr>
                                    <td class="filasTable">{{$detalle->nombreProducto}}</td>
                                    <td class="filasTable">{{$detalle->puntosProducto}}</td>
                                    <td class="filasTable">{{$detalle->precioProducto}}</td>
                                    <td class="filasTable">{{$detalle->cantidadProducto}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                <a href="{{route('admin.packages.index')}}" class="btn btn-danger btn-block btn-sm">
                                    <i class="fas fa-arrow-left"></i> Atras
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection