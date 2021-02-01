@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-sm-8 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h5><b>Nuevo Proveedor</b></h5>
                </div>

                <form action="{{route('admin.providers.update')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$proveedor->slugProveedor}}" name="slug">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>
                                        <button type="button" class="btn btn-info btn-xs" id="btn_buscar_ruc">
                                            <i class="fas fa-search"></i> BUSCAR EMPRESA POR RUC
                                        </button>
                                    </label>
                                    <input type="number"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('ruc') ? ' is-invalid' : '' }}"
                                        id="ruc_proveedor" value="{{$proveedor->rucProveedor}}" name="ruc">
                                    {!!$errors->first('ruc','<span class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Nombre Contacto</label>
                                    <input type="text"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('contacto') ? ' is-invalid' : '' }}"
                                        value="{{$proveedor->contactoProveedor}}" name="contacto">
                                    {!!$errors->first('contacto','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="number"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                        value="{{$proveedor->telefonoProveedor}}" name="telefono">
                                    {!!$errors->first('telefono','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-12 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Razon Social</label>
                                    <textarea
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('razon_social') ? ' is-invalid' : '' }}"
                                        rows="2" id="razon_social_proveedor"
                                        name="razon_social">{{$proveedor->razonSocialProveedor}}</textarea>
                                    {!!$errors->first('razon_social','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <textarea
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                        rows="2" id="direccion_proveedor"
                                        name="direccion">{{$proveedor->direccionProveedor}}</textarea>
                                    {!!$errors->first('direccion','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="container-fluid">
                            <div class="row justify-content-between">
                                <div class="col-5 col-sm-5 col-md-5 col-lg-2">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                </div>
                                <div class="col-5 col-sm-5 col-md-5 col-lg-2">
                                    <a href="{{route('admin.providers.index')}}"
                                        class="btn btn-danger btn-block btn-sm">
                                        <i class="fas fa-arrow-left"></i> Atras
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
</div>

@endsection