@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Informacion Almacen
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre Almacen</label>
                        <input type="text" class="form-control form-control-sm inputCentrado"
                            value="{{$almacen->nombreAlmacen}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea rows="2" class="form-control form-control-sm inputCentrado"
                            readonly>{{$almacen->direccionAlmacen}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tipo Almacen</label>
                        <input type="text" class="form-control form-control-sm inputCentrado"
                            value="{{$almacen->tipoAlmacen}}" readonly>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">

                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                <a href="{{route('admin.warehouses.index')}}" class="btn btn-danger btn-block btn-sm">
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