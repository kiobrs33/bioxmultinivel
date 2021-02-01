@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <br>

    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-8 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h5><b>Informacion del Proveedor</b></h5>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-4 col-lg-4">
                            <div class="form-group">
                                <label>RUC</label>
                                <input type="number" class="form-control form-control-sm inputCentrado"
                                    value="{{$proveedor->rucProveedor}}" name="ruc" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-sm-4 col-lg-4">
                            <div class="form-group">
                                <label>Nombre Contacto</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$proveedor->contactoProveedor}}" name="contacto" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-sm-4 col-lg-4">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="number" class="form-control form-control-sm inputCentrado"
                                    value="{{$proveedor->telefonoProveedor}}" name="telefono" readonly>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label>Razon Social</label>
                                <textarea class="form-control form-control-sm inputCentrado" rows="2"
                                    name="razon_social" readonly>{{$proveedor->razonSocialProveedor}}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-sm-6 col-lg-6">
                            <div class="form-group">
                                <label>Direccion</label>
                                <textarea class="form-control form-control-sm inputCentrado" rows="2" name="direccion"
                                    readonly>{{$proveedor->direccionProveedor}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-5 col-sm-5 col-md-5 col-lg-2">
                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-2">
                                <a href="{{route('admin.providers.index')}}" class="btn btn-danger btn-block btn-sm">
                                    <i class="fas fa-arrow-left"></i> Atras
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <br>
</div>

@endsection