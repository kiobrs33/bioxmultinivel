@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Organizacion</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{route('partner.inscriptions.index')}}"
                                class="nav-link{{request()->is('partner/inscriptions') ? ' active' : ''}}">
                                <i class="fas fa-list-ul"></i> Inscripciones
                                <span class="badge bg-info float-right" id="numero_inscripciones">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('partner.partners.index')}}"
                                class="nav-link{{request()->is('partner/partners') ? ' active' : ''}}">
                                <i class="fas fa-users"></i> Socios directos
                                <span class="badge bg-info float-right" id="numero_socios">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('partner.partners.tree-partners',Auth()->user()->socio->slugSocio)}}"
                                class="nav-link{{request()->is('partner/partners/tree-partners/*') ? ' active' : ''}}">
                                <i class="fas fa-sitemap"></i> Visor de arból uninivel
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-lg-9">
            @yield('contenidoInscription')
        </div>
    </div>
</div>
@endsection