@extends('layouts.appAdmin')

@section('contenido')
<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-10 col-lg-8">

            <form action="{{route('admin.products.update')}}" method="post">
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
                                <a class="nav-link" href="#tab_2" data-toggle="tab">Precio & Almacen &
                                    Unidades</a>
                            </li>

                        </ul>
                    </div>
                    <!-- END - CARD - HEADER -->

                    <!-- CARD - BODY -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- TAB - 1 -->
                            <div class="tab-pane active" id="tab_1">
                                <div class="form-group">
                                    <label>Codigo</label>
                                    <input type="text" name="codigo_producto" value="{{$producto->codigo}}"
                                        class="form-control inputCentrado">
                                    {!!$errors->first('codigo_producto','<span
                                        class="is-invalid text-danger">:message</span>')!!}
                                </div>
                                <div class="form-group">
                                    <label>Nombre Producto</label>
                                    <input type="text" name="nombre_producto" value="{{$producto->nombre_producto}}"
                                        class="form-control inputCentrado">
                                    {!!$errors->first('nombre_producto','<span
                                        class="is-invalid text-danger">:message</span>')!!}
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea class="form-control inputCentrado" rows="2"
                                        name="descripcion_producto">{{$producto->descripcion}}</textarea>
                                    {!!$errors->first('descripcion_producto','<span
                                        class="is-invalid text-danger">:message</span>')!!}
                                </div>
                                <div class="form-group">
                                    <label>Url Imagen</label>
                                    <input type="text" name="url_imagen_producto" value="{{$producto->url_imagen}}"
                                        class="form-control inputCentrado">
                                    {!!$errors->first('url_imagen_producto','<span
                                        class="is-invalid text-danger">:message</span>')!!}
                                </div>
                            </div>
                            <!-- TAB - 2 -->
                            <div class="tab-pane" id="tab_2">

                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select class="form-control" name="categoria_id_producto">
                                                @foreach($categorias as $categoria)
                                                @if($categoria->id == $producto->categoria_id)
                                                <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}
                                                </option>
                                                @else
                                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Unidad de Medida</label>
                                            <select class="form-control" name="tipo_unidad_producto">
                                                @foreach($unidades_medida as $unidad)
                                                @if($unidad == $producto->tipo_unidad)
                                                <option value="{{$unidad}}" selected>{{$unidad}}</option>
                                                @else
                                                <option value="{{$unidad}}">{{$unidad}}</option>
                                                @endif
                                                @endforeach
                                            </select>
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
                                            @foreach($stocks as $stock)
                                            <tr>
                                                <td class="filasTable">
                                                    <select class="form-control form-control-sm"
                                                        name="almacen_id_producto[]">
                                                        @foreach($almacenes as $almacen)
                                                        @if($almacen->id == $stock->warehouses_id)
                                                        <option value="{{$almacen->id}}" selected>{{$almacen->nombre}}
                                                        </option>
                                                        @else
                                                        <option value="{{$almacen->id}}">{{$almacen->nombre}}
                                                        </option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="filasTable">
                                                    <input type="number" step="any"
                                                        class="form-control form-control-sm inputCentrado"
                                                        value="{{$stock->cantidad}}" name="cantidad_producto[]">
                                                </td>
                                                <td class="filasTable">
                                                    <button type="button" id="btn_removePrecio"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="fas fa-times-circle"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- PRECIOS DEL PRODUCTO -->
                                <div class="form-group">
                                    <label>Tarifas Del Producto</label>
                                    <table class="table table-striped table-sm" id="table_precios">
                                        <thead style="background-color:#B0E2AD">
                                            <tr>
                                                <th class="filasTable">Tipo</th>
                                                <th class="filasTable">Precio S/.</th>
                                                <th width="50px" class="filasTable">
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        id="btn_nuevo_precio">
                                                        <i class="fas fa-plus-circle"></i></button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($precios as $precio)
                                            <tr>
                                                <td class="filasTable">
                                                    <input type="text"
                                                        class="form-control form-control-sm inputCentrado"
                                                        value="{{$precio->nombre_precio}}"
                                                        name="nombre_precio_producto[]">
                                                </td>
                                                <td class="filasTable">
                                                    <input type="number" step="any"
                                                        class="form-control form-control-sm inputCentrado"
                                                        value="{{$precio->valor}}" name="valor_precio_producto[]">
                                                </td>
                                                <td class="filasTable">
                                                    <button type="button" id="btn_removePrecio"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="fas fa-times-circle"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
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