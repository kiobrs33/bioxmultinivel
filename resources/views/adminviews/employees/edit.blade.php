@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Trabajador
                </div>

                <form action="{{route('admin.employees.update')}}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{$trabajador->id}}" name="id_trabajador">
                    <input type="hidden" value="{{$trabajador->users_id}}" name="id_usuario">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>
                                        <button type="button" class="btn btn-success btn-xs"
                                            id="btn_buscar_dnitTrabajador">
                                            <i class="fas fa-search"></i> BUSCAR DATOS POR DNI
                                        </button>
                                    </label>
                                    <input type="number"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                                        value="{{$trabajador->dniTrabajador}}" id="dni_trabajador" name="dni">
                                    {!!$errors->first('dni','<span class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('nombres') ? ' is-invalid' : '' }}"
                                        value="{{$trabajador->nombresTrabajador}}" id="nombres_trabajador"
                                        name="nombres">
                                    {!!$errors->first('nombres','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Paterno</label>
                                    <input type="text"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}"
                                        value="{{$trabajador->apellidoPaternoTrabajador}}"
                                        id="apellido_paterno_trabajador" name="apellido_paterno">
                                    {!!$errors->first('apellido_paterno','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Apellido Materno</label>
                                    <input type="text"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}"
                                        value="{{$trabajador->apellidoMaternoTrabajador}}"
                                        id="apellido_materno_trabajador" name="apellido_materno">
                                    {!!$errors->first('apellido_materno','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                        value="{{$trabajador->telefonoTrabajador}}" name="telefono">
                                    {!!$errors->first('telefono','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select
                                        class="form-control form-control-sm{{ $errors->has('sexo') ? ' is-invalid' : '' }}"
                                        name="sexo">
                                        @if($trabajador->sexoTrabajador == 'masculino')
                                        <option value="masculino" selected>Masculino</option>
                                        <option value="femenino">Femenino</option>
                                        @else
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino" selected>Femenino</option>
                                        @endif
                                    </select>
                                    {!!$errors->first('sexo','<span class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Direccion de domicilio</label>
                            <input type="text"
                                class="form-control form-control-sm inputCentrado{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                value="{{$trabajador->direccionTrabajador}}" name="direccion">
                            {!!$errors->first('direccion','<span class="error invalid-feedback">:message</span>')!!}
                        </div>

                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email"
                                class="form-control form-control-sm inputCentrado{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                value="{{$trabajador->correoTrabajador}}" name="correo">
                            {!!$errors->first('correo','<span class="error invalid-feedback">:message</span>')!!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                </div>
                                <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                    <a href="{{route('admin.employees.index')}}"
                                        class="btn btn-danger btn-block btn-sm">
                                        <i class="fas fa-undo-alt"></i> Atras
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection