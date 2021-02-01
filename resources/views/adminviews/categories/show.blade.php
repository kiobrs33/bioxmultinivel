@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-7">

            <div class="card">
                <div class=" card-header">
                    Informacion Categoria
                </div>


                <div class="card-body">
                    <div class="form-group">
                        <label>Nombre Categoria</label>
                        <input type="text" value="{{$categoria->nombreCategoria}}"
                            class="form-control form-control-sm inputCentrado" readonly>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="container-fluid">
                        <div class="row justify-content-between">
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                            </div>
                            <div class="col-5 col-sm-5 col-md-5 col-lg-4">
                                <a href="{{route('admin.categories.index')}}" class="btn btn-danger btn-block btn-sm">
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