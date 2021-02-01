@extends('layouts.appAdmin')

@section('contenido')
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-10 col-lg-8">

            <form action="{{route('admin.products.store')}}" method="post">
                {{ csrf_field() }}

                <!-- Custom Tabs -->
                <div class="card mt-4">
                    <!-- CARD - HEADER -->
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3"><b>Producto</b></h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab_1" data-toggle="tab">Informacion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_2" data-toggle="tab">Almacen & Unidades</a>
                            </li>

                        </ul>
                    </div>
                    <!-- END - CARD - HEADER -->

                    <!-- CARD - BODY -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- TAB - 1 -->
                            <div class="tab-pane active" id="tab_1">

                                <!-- INPUTS - CODIGO - PUNTOS -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Codigo</label>
                                            <input type="text" name="codigo"
                                                class="form-control form-control-sm inputCentrado{{ $errors->has('codigo') ? ' is-invalid' : '' }}"
                                                value="{{old('codigo')}}">
                                            {!!$errors->first('codigo','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Puntos</label>
                                            <input type="text" name="puntos"
                                                class="form-control form-control-sm inputCentrado{{ $errors->has('puntos') ? ' is-invalid' : '' }}"
                                                value="{{old('puntos')}}">
                                            {!!$errors->first('puntos','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- INPUTS - NOMBRE - PRECIO - PRODUCTO -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre Producto</label>
                                            <input type="text" name="nombre"
                                                class="form-control form-control-sm inputCentrado{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                                value="{{old('nombre')}}">
                                            {!!$errors->first('nombre','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- PRECIOS DEL PRODUCTO -->
                                        <div class="form-group">
                                            <label>Precio del Producto</label>
                                            <input type="number" name="precio"
                                                class="form-control form-control-sm inputCentrado{{ $errors->has('precio') ? ' is-invalid' : '' }}"
                                                step="any" value="{{old('precio')}}">
                                            {!!$errors->first('precio','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- INPUTS - DESCRIPCION - URL IMAGEN -->
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        rows="2" name="descripcion">{{old('descripcion')}}</textarea>
                                    {!!$errors->first('descripcion','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                                <div class="form-group">
                                    <label>Url Imagen</label>
                                    <input type="text" name="url_imagen"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('url_imagen') ? ' is-invalid' : '' }}"
                                        value="{{old('url_imagen')}}">
                                    {!!$errors->first('url_imagen','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>

                            <!-- TAB - 2 -->
                            <div class="tab-pane" id="tab_2">

                                <!-- SELECT - CATEGORIAS - UNIDAD DE MEDIDA -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select
                                                class="form-control form-control-sm{{ $errors->has('categoria') ? ' is-invalid' : '' }}"
                                                name="categoria">
                                                <option value="" selected>Seleccionar</option>
                                                @foreach($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}
                                                </option>
                                                @endforeach
                                            </select>
                                            {!!$errors->first('categoria','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Unidad de Medida</label>
                                            <select
                                                class="form-control form-control-sm{{ $errors->has('tipo_unidad') ? ' is-invalid' : '' }}"
                                                name="tipo_unidad">
                                                <option value="" selected>Seleccionar</option>
                                                @foreach($unidades_medida as $unidad)
                                                <option value="{{$unidad}}">{{$unidad}}</option>
                                                @endforeach
                                            </select>
                                            {!!$errors->first('tipo_unidad','<span
                                                class="error invalid-feedback">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>

                                <!-- ALMACENES DEL PRODUCTO -->
                                <div class="form-group">
                                    <label>Cantidad y Almacen Producto</label>
                                    <table class="table table-striped table-sm" id="table_stocks">
                                        <thead style="background-color:#B0E2AD">
                                            <tr>
                                                <th class="filasTable">Almacen</th>
                                                <th class="filasTable">Cantidad</th>
                                                <th width="50px" class="filasTable">
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        id="btn_nuevo_stock">
                                                        <i class="fas fa-plus-circle"></i></button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="filasTable" width="330px">
                                                    <select
                                                        class="form-control form-control-sm{{ $errors->has('almacen*') ? ' is-invalid' : '' }}"
                                                        name="almacen[]">
                                                        <option value="" selected>Seleccionar</option>
                                                        @foreach($almacenes as $almacen)
                                                        <option value="{{$almacen->id}}">{{$almacen->nombreAlmacen}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    {!!$errors->first('almacen*','<span
                                                        class="error invalid-feedback">:message</span>')!!}
                                                </td>
                                                <td class="filasTable">
                                                    <input type="number" step="any"
                                                        class="form-control form-control-sm inputCentrado{{ $errors->has('cantidad*') ? ' is-invalid' : '' }}"
                                                        name="cantidad[]">
                                                    {!!$errors->first('cantidad*','<span
                                                        class="error invalid-feedback">:message</span>')!!}
                                                </td>
                                                <td class="filasTable">
                                                    <!-- <button type="button" id="btn_removePrecio"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="fas fa-times-circle"></i></button> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END - CARD - BODY -->

                    <!-- FOOTER -->
                    <div class="card-footer">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                </div>
                                <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                    <a href="{{route('admin.products.index')}}" class="btn btn-danger btn-block btn-sm">
                                        <i class="fas fa-undo-alt"></i> Atras
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END - CARD - FOOTER -->

                </div>
            </form>

        </div>
    </div>
</div>

@endsection