@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Categoria
                </div>

                <form action="{{route('admin.categories.update')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$categoria->slugCategoria}}" name="slug">

                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre Categoria</label>
                            <input type="text" name="nombre" value="{{$categoria->nombreCategoria}}"
                                class="form-control form-control-sm inputCentrado{{ $errors->has('nombre') ? ' is-invalid' : '' }}">
                            {!!$errors->first('nombre','<span class="error invalid-feedback">:message</span>')!!}
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
                                    <a href="{{route('admin.categories.index')}}"
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