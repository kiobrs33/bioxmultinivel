@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-10">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Informacion del Producto
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <img src="{{$producto->urlImagenProducto}}" width="170px" height="170px"
                                class="img-fluid rounded">
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Nombre Producto</label>
                                        <input type="text" value="{{$producto->nombreProducto}}"
                                            class="form-control inputCentrado" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <textarea rows="2" class="form-control inputCentrado"
                                            readonly>{{$producto->descripcionProducto}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Codigo</label>
                                        <input type="text" value="{{$producto->codigoProducto}}"
                                            class="form-control form-control-sm inputCentrado" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Tipo Unidad</label>
                                        <input type="text" value="{{$producto->tipoUnidadProducto}}"
                                            class="form-control form-control-sm inputCentrado" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <input type="text" value="{{$producto->categoriaProducto}}"
                                            class="form-control form-control-sm inputCentrado" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Precio</label>
                                        <input type="text" value="{{$producto->precioProducto}}"
                                            class="form-control form-control-sm inputCentrado" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead style="background-color:#C184FF">
                                            <tr>
                                                <th class="filasTable">Almacen</th>
                                                <th class="filasTable">Tipo Almacen</th>
                                                <th class="filasTable">Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($stocks as $stock)
                                            <tr>
                                                <td class="filasTable">{{$stock->nombreAlmacen}}</td>
                                                <td class="filasTable">{{$stock->tipoAlmacen}}</td>
                                                <td class="filasTable">{{$stock->cantidadStock}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
                                <a href="{{route('admin.products.index')}}" class="btn btn-danger btn-block btn-sm">
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