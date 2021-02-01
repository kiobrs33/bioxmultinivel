@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Rango
                </div>


                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre Rango</label>
                        <input type="text" name="nombre" class="form-control form-control-sm inputCentrado"
                            value="{{$rango->nombreRango}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="descripcion" rows="2" class="form-control form-control-sm inputCentrado"
                            readonly>{{$rango->descripcionRango}}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Puntaje Personal</label>
                                <input type="number" name="puntaje_personal"
                                    class="form-control form-control-sm inputCentrado"
                                    value="{{$rango->puntajePersonalRango}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Puntaje Grupal</label>
                                <input type="number" name="puntaje_grupal"
                                    class="form-control form-control-sm inputCentrado"
                                    value="{{$rango->puntajeGrupalRango}}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Puntaje Directos</label>
                                <input type="number" name="puntaje_directos"
                                    class="form-control form-control-sm inputCentrado"
                                    value="{{$rango->puntajeDirectosRango}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Activos Franquiciados</label>
                                <input type="number" name="activos_franquiciados"
                                    class="form-control form-control-sm inputCentrado"
                                    value="{{$rango->activosFranquiciadosRango}}" readonly>
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
                                <a href="{{route('admin.ranks.index')}}" class="btn btn-danger btn-block btn-sm">
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