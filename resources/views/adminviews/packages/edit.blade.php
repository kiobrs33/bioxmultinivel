@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Editar Paquete
                </div>

                <form action="{{route('admin.packages.update')}}" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{$paquete->slug}}" name="slug_paquete">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre Paquete</label>
                            <input type="text" name="nombre_paquete" class="form-control inputCentrado"
                                value="{{$paquete->nombre_paquete}}">
                            {!!$errors->first('nombre_paquete','<span
                                class="is-invalid text-danger">:message</span>')!!}
                        </div>
                        <div class="form-group">
                            <label>Puntos del Paquete</label>
                            <input type="text" name="puntos_paquete" class="form-control inputCentrado"
                                value="{{$paquete->puntos_paquete}}">
                            {!!$errors->first('puntos_paquete','<span
                                class="is-invalid text-danger">:message</span>')!!}
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
                                    <a href="{{route('admin.packages.index')}}" class="btn btn-danger btn-block btn-sm">
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