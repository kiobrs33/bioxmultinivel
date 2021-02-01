@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12 col-lg-9">
                <h1>Nueva Inscripcion</h1>
            </div><!-- /.col -->
            <div class="col-lg-3 mt-1" id="btn_atras">
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
    <form action="{{route('partner.inscriptions.storeFree')}}" method="POST">

        {{ csrf_field() }}

        <div class="row" id="ContenedorInscripcionSocio">

            <!-- CONTENEDOR DE LA INSCRIPCION ===================================================================== -->
            <div class="col-lg-8">

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
                                                <option value="">Seleccionar</option>
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
                                                <option value="">Seleccionar</option>
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
                                                <option value="">Seleccionar</option>
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
                                                <option value="">Seleccionar</option>
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
                <div class="row">
                    <!-- USUARIO PARA EL SITIO WEB -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Patrocinador</label>
                                    <input type="text" class="form-control inputCentrado" value="{{$patrocinador}}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RESUMEN DEL CARRITO -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#CDCFD1;">
                                <span>Resumen Orden</span>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Fecha de Entrega</label>
                                    <input type="date"
                                        class="form-control form-control-sm{{ $errors->has('fecha_entrega') ? ' is-invalid' : '' }}"
                                        name="fecha_entrega">
                                    {!!$errors->first('fecha_entrega','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-12 mb-2">
                                        <button type="button" class="btn btn-info btn-sm btn-block"
                                            id="btn_contenedorCarrito">
                                            <i class="fas fa-plus"></i> Agregar Productos</button>
                                    </div>
                                </div>
                                <table class="table table-striped table-sm" id="table_resumen_carrito">
                                    <thead>
                                        <tr>
                                            <th class="filasTable">Descripcion</th>
                                            <th class="filasTable">Cantidad</th>
                                            <th class="filasTable">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>Subtotal</b></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class="form-control form-control-sm inputCentrado{{ $errors->has('subtotal') ? ' is-invalid' : '' }}"
                                                    id="subtotal_resumen_carrito" name="subtotal" value="0" readonly>
                                                {!!$errors->first('subtotal','<span
                                                    class="error invalid-feedback">:message</span>')!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>IGV</b></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class="form-control form-control-sm inputCentrado{{ $errors->has('impuesto') ? ' is-invalid' : '' }}"
                                                    id="igv_resumen_carrito" name="impuesto" value="0" readonly>
                                                {!!$errors->first('impuesto','<span
                                                    class="error invalid-feedback">:message</span>')!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Total</b></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class="form-control form-control-sm inputCentrado{{ $errors->has('total') ? ' is-invalid' : '' }}"
                                                    id="total_resumen_carrito" name="total" value="0" readonly>
                                                {!!$errors->first('total','<span
                                                    class="error invalid-feedback">:message</span>')!!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Puntos</b></td>
                                            <td colspan="2">
                                                <input type="text"
                                                    class="form-control form-control-sm inputCentrado{{ $errors->has('total_puntos') ? ' is-invalid' : '' }}"
                                                    id="puntos_resumen_carrito" name="total_puntos" value="0" readonly>
                                                {!!$errors->first('total_puntos','<span
                                                    class="error invalid-feedback">:message</span>')!!}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- LISTA DE PRODUCTO - FIN -->

                </div>
            </div>

        </div>
        <!-- FIN DEL CONTENEDOR INFORMACION SOCIO -->

        <!-- CONTENEDOR DE ORDEN - CARRITO ========================================================================== -->
        <div class="row" id="ContenedorCarritoOrden">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header" style="background-color:#CDCFD1;">
                        <span>Patrocinador</span>
                    </div>
                    <div class="card-body">
                        <!-- CARRITOS CON LA LISTA DE PRODUCTO PARA VENDER -->
                        <div style="height:410px; overflow-y:scroll;">
                            <div class="row container-fluid">
                                @foreach($productos as $producto)
                                <div class="col-lg-12 align-self-center">
                                    <div class="card border">
                                        <div class="row">
                                            <div class="col-lg-3 mt-1" align="center">
                                                <img src="{{$producto->urlImagenProducto}}" height="100px" width="100px"
                                                    class="img-responsive" alt="Responsive image">
                                            </div>
                                            <div class="col-lg-7">
                                                <!-- INPUTS PARA JS -->
                                                <input type="hidden" value="{{$producto->id}}" class="id_producto">
                                                <input type="hidden" value="{{$producto->precioProducto}}"
                                                    class="precio_producto">
                                                <input type="hidden" value="{{$producto->precioProducto}}"
                                                    class="puntos_producto">
                                                <input type="hidden" value="{{$producto->nombreProducto}}"
                                                    class="nombre_producto">


                                                <!-- Informacion PARA EL USUARIO -->
                                                <h6><b>{{$producto->nombreProducto}}</b></h6>
                                                <h6><b>Codigo : </b>{{$producto->codigoProducto}}</h6>
                                                <h6><b>Puntos : </b>{{$producto->puntosProducto}}</h6>
                                                <h6><b>Precio : </b>S/.{{$producto->precioProducto}}</h6>
                                            </div>
                                            <div class="col-lg-2 align-self-center">
                                                <button type="button"
                                                    class="btn bg-gradient-success btn_agregarProducto">
                                                    <i class="fas fa-cart-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PALETA DE INFORMACION -->
            <div class="col-lg-4">
                <div class="row">
                    <!-- LISTA DE PRODUCTO -->
                    <div class="col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#CDCFD1;">
                                <button type="button" class="btn btn-info btn-sm btn-block"
                                    id="btn_contenedorInscripcion">
                                    <i class="fas fa-user-edit"></i> Regresar a Inscripcion</button>
                            </div>
                            <div class="card-body table-responsive p-0" style="height:200px;">
                                <table class="table table-head-fixed table-striped table-sm" id="table_carrito">
                                    <thead>
                                        <tr>
                                            <th class="filasTable">Descripcion</th>
                                            <th width="100px" class="filasTable">Cantidad</th>
                                            <th class="filasTable">Precio</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer table-responsive p-0">
                                <table class="table table-sm">
                                    <tfoot>
                                        <tr>
                                            <td width="170px" class="filasTable"><b>Subtotal</b></td>
                                            <td colspan="2">
                                                <input type="text" class="form-control form-control-sm inputCentrado"
                                                    id="subtotal_carrito" value="0" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="170px" class="filasTable"><b>IGV</b></td>
                                            <td colspan="2">
                                                <input type="text" class="form-control form-control-sm inputCentrado"
                                                    id="igv_carrito" value="0" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="170px" class="filasTable"><b>Total</b></td>
                                            <td colspan="2">
                                                <input type="text" class="form-control form-control-sm inputCentrado"
                                                    id="total_soles_carrito" value="0" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="170px" class="filasTable"><b>Puntos</b></td>
                                            <td colspan="2">
                                                <input type="text" class="form-control form-control-sm inputCentrado"
                                                    id="total_puntos_carrito" value="0" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- LISTA DE PRODUCTO - FIN -->

                </div>

            </div>
        </div>

        <!-- BOTON ENVIAR -->
        <div class="row justify-content-center" id="ContainerBotonEnviar">
            <div class="col-12 col-md-3 col-lg-3 mb-3">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fas fa-share-square"></i> Enviar</button>
            </div>
        </div>


    </form>
</div>
@endsection