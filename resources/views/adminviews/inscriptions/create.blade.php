@extends('layouts.appAdmin')

@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-12">
            <!-- 
            Registrar la informacion del NUEVO SOSCIO
            Seleccionar su RANGO o NIVEL
            Seleccionar el PAQUETE 
            Registrar los PRODUCTOS
            Calcular EL TOTAL - SUBTOTAL - IGV - TOTAL DE PUNTOS
            CREAR VISTA PARA LA SELECCION DE PRODUCTOS
            Crear formulario del NUEVO SOCIO
            -->

            <!-- Custom Tabs -->
            <div class="card mt-3">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3"><b>Nuevo Socio BIOX</b></h3>
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Paso 1</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Paso 2</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Paso 3</a></li>
                    </ul>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" name="codigo_socio" class="form-control inputCentrado"
                                            value="{{$codigo_aleatorio}}">
                                        {!!$errors->first('codigo_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Ciudad</label>
                                        <select name="ciudad_socio" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach($ciudades as $ciudad)
                                            <option value="{{$ciudad}}">{{$ciudad}}</option>
                                            @endforeach
                                        </select>
                                        {!!$errors->first('ciudad_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select name="sexo_socio" class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="Hombre">Hombre</option>
                                            <option value="Mujer">Mujer</option>
                                        </select>
                                        {!!$errors->first('sexo_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Rango</label>
                                        <select name="rango_id_socio" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach($rangos as $rango)
                                            <option value="{{$rango->id}}">{{$rango->nombre_rango}}</option>
                                            @endforeach
                                        </select>
                                        {!!$errors->first('rango_id_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>
                                            <button type="button" class="btn btn-info btn-sm mb-1"
                                                id="btn_buscar_dniSocio">
                                                <i class="fas fa-search"></i> Buscar Dni</button>
                                        </label>
                                        <input type="text" name="dni_socio" class="form-control inputCentrado"
                                            id="dni_socio" value="{{old('apellidos_socio')}}">
                                        {!!$errors->first('apellidos_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombres_socio" class="form-control inputCentrado"
                                            value="{{old('nombres_socio')}}" id="nombres_socio">
                                        {!!$errors->first('nombres_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" name="apellidos_socio" class="form-control inputCentrado"
                                            value="{{old('apellidos_socio')}}" id="apellidos_socio">
                                        {!!$errors->first('apellidos_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Correo</label>
                                <input type="text" name="correo_socio" class="form-control inputCentrado"
                                    value="{{old('correo_socio')}}">
                                {!!$errors->first('correo_socio','<span
                                    class="is-invalid text-danger">:message</span>')!!}
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password_socio" class="form-control inputCentrado"
                                            id="password_1">
                                        {!!$errors->first('password_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Repetir Contraseña</label>
                                        <input type="password" class="form-control inputCentrado" id="password_2">
                                        {!!$errors->first('password_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" name="direccion_socio" class="form-control inputCentrado"
                                            value="{{old('direccion_socio')}}">
                                        {!!$errors->first('direccion_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <input type="number" name="telefono_socio" class="form-control inputCentrado"
                                            value="{{old('telefono_socio')}}">
                                        {!!$errors->first('telefono_socio','<span
                                            class="is-invalid text-danger">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">

                                <div class="col-lg-7">
                                    <!-- CARRITOS CON LA LISTA DE PRODUCTO PARA VENDER -->
                                    <div style="height:400px; overflow-y:scroll;">
                                        <label for=""></label>
                                        <div class="row container-fluid">
                                            @foreach($productos as $producto)
                                            <div class="col-lg-12 align-self-center">
                                                <div class="card bg-light">
                                                    <div class="row">
                                                        <div class="col-lg-3" align="center">
                                                            <img src="{{$producto->url_imagen}}" height="100px"
                                                                width="100px" class="img-responsive"
                                                                alt="Responsive image">
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <!-- INPUTS PARA JS -->
                                                            <input type="hidden" value="{{$producto->id}}"
                                                                class="id_producto">
                                                            <input type="hidden" value="{{$producto->precio}}"
                                                                class="precio_producto">
                                                            <input type="hidden" value="{{$producto->puntos}}"
                                                                class="puntos_producto">
                                                            <input type="hidden" value="{{$producto->codigo}}"
                                                                class="codigo_producto">


                                                            <!-- Informacion PARA EL USUARIO -->
                                                            <h6><b>{{$producto->nombre_producto}}</b></h6>
                                                            <h6>Codigo : <b>{{$producto->codigo}}</b></h6>
                                                            <h6>Puntos : <b>{{$producto->puntos}}</b></h6>
                                                            <h6>Precio : <b>S/.{{$producto->precio}}</b></h6>
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

                                <div class="col-lg-5">
                                    <!-- SELECT - PAQUETE  -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Paquete</label>
                                                <select name="paquete_inscripcion" class="form-control"
                                                    id="paquete_inscripcion">
                                                    <option value="">Seleccione</option>
                                                    @foreach($paquetes as $paquete)
                                                    <option value="{{$paquete->id}}">{{$paquete->nombre_paquete}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                {!!$errors->first('paquete_inscripcion','<span
                                                    class="is-invalid text-danger">:message</span>')!!}
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>PUNTOS META</label>
                                                <input type="text" class="form-control inputCentrado" id="puntos_meta"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TABLA CARRITO -->
                                    <div>
                                        <table class="table table-striped table-sm" id="table_carrito">
                                            <thead>
                                                <tr>
                                                    <th class="filasTable">Codigo</th>
                                                    <th class="filasTable">Puntos</th>
                                                    <th class="filasTable">Precio</th>
                                                    <th class="filasTable" width="110px">Cantidad</th>
                                                    <th class="filasTable" width="40px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <h3>Terminos y condiciones</h3>
                            <embed src="https://www.xerox.es/oficina/latest/OPBTC-01.PDF" type="application/pdf"
                                width="50%" height="600px" />
                            <button type="submit" class="btn btn-primary btn-block btn-sm">
                                <i class="fas fa-save"></i> Guardar
                            </button>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
        </div>
    </div>
</div>

@endsection