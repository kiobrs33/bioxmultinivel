@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Inscripcion</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-lg-4 mb-2">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Simple</h3>
                    <p>Inscripcion simple</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('partner.inscriptions.createSimple')}}" class="small-box-footer">Aqui <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>Paquete</h3>
                    <p>Inscripcion por paquete</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('partner.inscriptions.createPackage')}}" class="small-box-footer">Aqui <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 mb-2">
            <div class="small-box bg-gray">
                <div class="inner">
                    <h3>Libre</h3>
                    <p>Inscripcion libre</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('partner.inscriptions.createFree')}}" class="small-box-footer">Aqui <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection