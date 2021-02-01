@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Trabajador
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Dni</label>
                                <input type="number" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->dniTrabajador}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->nombresTrabajador}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->apellidoPaternoTrabajador}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->apellidoMaternoTrabajador}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->telefonoTrabajador}}" readonly>
                            </div>

                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Sexo</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->sexoTrabajador}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Direccion de domicilio</label>
                        <input type="text" class="form-control form-control-sm inputCentrado"
                            value="{{$trabajador->direccionTrabajador}}" readonly>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->correoTrabajador}}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control form-control-sm inputCentrado"
                                    value="{{$trabajador->usernameTrabajador}}" readonly>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                <a href="{{route('admin.employees.index')}}" class="btn btn-danger btn-block btn-sm">
                                    <i class="fas fa-undo-alt"></i> Atras
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