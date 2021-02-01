@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Almacen
                </div>

                <form action="{{route('admin.warehouses.update')}}" method="POST">

                    {{ csrf_field() }}

                    <input type="hidden" value="{{$almacen->id}}" name="id_almacen">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nombre Almacen</label>
                                    <input type="text" name="nombre"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                        value="{{$almacen->nombreAlmacen}}">
                                    {!!$errors->first('nombre','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Tipo Almacen</label>
                                    <select name="tipo"
                                        class="form-control form-control-sm{{ $errors->has('tipo') ? ' is-invalid' : '' }}">
                                        @foreach($tipos_almacenes as $tipo_almacen)
                                        @if($tipo_almacen == $almacen->tipoAlmacen)
                                        <option value="{{$tipo_almacen}}" selected>{{$tipo_almacen}}</option>
                                        @else
                                        <option value="{{$tipo_almacen}}">{{$tipo_almacen}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    {!!$errors->first('tipo','<span class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <textarea name="direccion" rows="2"
                                class="form-control form-control-sm inputCentrado{{ $errors->has('direccion') ? ' is-invalid' : '' }}">{{$almacen->direccionAlmacen}}</textarea>
                            {!!$errors->first('direccion','<span class="error invalid-feedback">:message</span>')!!}
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
                                    <a href="{{route('admin.warehouses.index')}}"
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