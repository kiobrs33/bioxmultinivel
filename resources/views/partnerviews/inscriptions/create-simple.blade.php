@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12 col-lg-9">
                <h1>Nueva Inscripcion</h1>
            </div><!-- /.col -->
            <div class="col-lg-3 mt-1">
                <a href="{{route('partner.inscriptions.type-inscription')}}" class="btn btn-secondary btn-block">
                    <i class="fas fa-angle-double-left"></i> Atras
                </a>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('contenido')
<div class="container">
    <form action="{{route('partner.inscriptions.storeSimple')}}" method="POST">

        {{ csrf_field() }}

        <div class="row" id="contenedorInscripcion">
            <div class="col-lg-8">

                <!-- FORMULARIOS PARA LA INSCRIPCION -->

                <!-- Informacion Personal -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#CDCFD1;">
                                <span>Informacion Personal</span>
                            </div>
                            <div class="card-body">

                                <!-- DNI - NOMBRES -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Dni</label>
                                            <input type="number"
                                                class="form-control form-control-sm{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                                                name="dni" value="{{old('dni')}}" placeholder="Dni">
                                            {!!$errors->first('dni','<span
                                                class="error invalid-feedback">:message</span>')!!}

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input type="text"
                                                class="form-control form-control-sm{{ $errors->has('nombres') ? ' is-invalid' : '' }}"
                                                name="nombres" value="{{old('nombres')}}" placeholder="Nombres">
                                            {!!$errors->first('nombres','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Apellidos Paterno y Materno -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text"
                                                class="form-control form-control-sm{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}"
                                                name="apellido_paterno" value="{{old('apellido_paterno')}}"
                                                placeholder="Apellido Paterno">
                                            {!!$errors->first('apellido_paterno','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text"
                                                class="form-control form-control-sm{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}"
                                                name="apellido_materno" value="{{old('apellido_materno')}}"
                                                placeholder="Apellido Materno">
                                            {!!$errors->first('apellido_materno','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Fecha de Nacimiento -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Fecha de Nacimiento</label>
                                            <input type="date"
                                                class="form-control form-control-sm{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}"
                                                name="fecha_nacimiento">
                                            {!!$errors->first('fecha_nacimiento','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select name="sexo"
                                                class="form-control form-control-sm{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                                                <option value="">Seleccionar</option>
                                                @foreach($sexos as $sexo)
                                                <option value="{{$sexo}}">{{$sexo}}</option>
                                                @endforeach
                                            </select>
                                            {!!$errors->first('sexo','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Direccion Domicilio -->
                                <div class="form-group">
                                    <label>Direccion Domicilio</label>
                                    <input type="text"
                                        class="form-control form-control-sm{{ $errors->has('direccion_domicilio') ? ' is-invalid' : '' }}"
                                        name="direccion_domicilio" value="{{old('direccion_domicilio')}}"
                                        placeholder="Direccion Domicilio">
                                    {!!$errors->first('direccion_domicilio','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>

                                <!-- Pais - Departamento -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Pais</label>
                                            <select name="pais" id="pais_select"
                                                class="form-control form-control-sm{{ $errors->has('pais') ? ' is-invalid' : '' }}">
                                            </select>
                                            {!!$errors->first('pais','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select name="departamento" id="departamento_select"
                                                class="form-control form-control-sm{{ $errors->has('departamento') ? ' is-invalid' : '' }}">
                                            </select>
                                            {!!$errors->first('departamento','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Distrito - Sexo -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Provincia</label>
                                            <select name="provincia" id="provincia_select"
                                                class="form-control form-control-sm{{ $errors->has('provincia') ? ' is-invalid' : '' }}">
                                            </select>
                                            {!!$errors->first('provincia','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Distrito</label>
                                            <select name="distrito" id="distrito_select"
                                                class="form-control form-control-sm{{ $errors->has('distrito') ? ' is-invalid' : '' }}">
                                            </select>
                                            {!!$errors->first('distrito','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Correo Electronico -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Correo Electronico</label>
                                            <input type="email"
                                                class="form-control form-control-sm{{ $errors->has('correo_electronico') ? ' is-invalid' : '' }}"
                                                name="correo_electronico" value="{{old('correo_electronico')}}"
                                                id="email_1" placeholder="Correo electronico">
                                            {!!$errors->first('correo_electronico','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Confirmar Correo Electronico</label>
                                            <input type="email"
                                                class="form-control form-control-sm{{ $errors->has('correo_electronico') ? ' is-invalid' : '' }}"
                                                id="email_2" placeholder="Correo electronico">
                                            {!!$errors->first('correo_electronico','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Telefono -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input type="number"
                                                class="form-control form-control-sm{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                                name="telefono" value="{{old('telefono')}}"
                                                placeholder="Correo electronico">
                                            {!!$errors->first('telefono','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- USUARIO PARA EL SITIO WEB -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#CDCFD1;">
                                <span>Cuenta para el sitio web</span>
                            </div>
                            <div class="card-body">
                                <p>La cuenta será generarda de forma automatica, el inscrito deberá revisar su Correo
                                    Electronico.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- TERMINOS Y CONDICIONES -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#CDCFD1;">
                                <span>Terminos y Condiciones</span>
                            </div>
                            <div class="card-body">
                                <embed src="https://www.xerox.es/oficina/latest/OPBTC-01.PDF" type="application/pdf"
                                    width="100%" height="400px" />

                                <hr>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input{{ $errors->has('terminos_condiciones') ? ' is-invalid' : '' }}"
                                            type="checkbox" name="terminos_condiciones">
                                        <label class="form-check-label">Acepto Términos y Condiciones.</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- PALETA DE INFORMACION -->
            <div class="col-lg-4">
                <!-- USUARIO PARA EL SITIO WEB -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="background-color:#CDCFD1;">
                            <span>Patrocinador</span>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control inputCentrado" value="{{$patrocinador}}" readonly>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- 2 FILA -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-share-square"></i> Enviar</button>
            </div>
        </div>

    </form>
</div>

@endsection