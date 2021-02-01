@extends('layouts.appPartner')

@section('contenido')
<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                    style="background: url('/adminlte/dist/img/photo1.png') center 68%;">
                    <h4 class="text-center">
                        Rene Edgard Lozano Ramos
                    </h4>
                    <h5 class="text-center">Codigo: 234j4j</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="/adminlte/dist/img/user3-128x128.jpg" alt="User Avatar">
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="border-radius:50px">
                <span class="info-box-icon bg-info" style="border-radius:100%">
                    <i class="fas fa-coins"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Puntos</span>
                    <span class="info-box-number" id="puntosSocio">
                        <div class="spinner-border spinner-border-sm text-blue" id="cargaPuntosSocio" role="status">
                        </div>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="border-radius:50px">
                <span class="info-box-icon bg-success" style="border-radius:100%">
                    <i class="fas fa-clipboard-list"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Inscripciones</span>
                    <span class="info-box-number" id="numeroInscripciones">
                        <div class="spinner-border spinner-border-sm text-blue" id="cargaNumeroInscripciones"
                            role="status">
                        </div>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="border-radius:50px">
                <span class="info-box-icon bg-purple" style="border-radius:100%">
                    <i class="fas fa-user-friends"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Seguidores</span>
                    <span class="info-box-number" id="numeroSeguidores">
                        <div class="spinner-border spinner-border-sm text-blue" id="cargaNumeroSeguidores"
                            role="status">
                        </div>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="border-radius:50px">
                <span class="info-box-icon bg-danger" style="border-radius:100%">
                    <i class="fas fa-truck"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pedidos</span>
                    <span class="info-box-number" id="numeroPedidos">
                        <div class="spinner-border spinner-border-sm text-blue" id="cargaNumeroPedidos" role="status">
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $.ajax({
        type: "GET",
        url: "/partner/extras/numeroPedidos",
        success: function(res) {
            $("#cargaNumeroPedidos").hide();
            $("#numeroPedidos").text(res);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        },
    });

    $.ajax({
        type: "GET",
        url: "/partner/extras/numeroInscripciones",
        success: function(res) {
            $("#cargaNumeroInscripciones").hide();
            $("#numeroInscripciones").text(res);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        },
    });

    $.ajax({
        type: "GET",
        url: "/partner/extras/numeroSeguidores",
        success: function(res) {
            $("#cargaNumeroSeguidores").hide();
            $("#numeroSeguidores").text(res);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        },
    });

    $.ajax({
        type: "GET",
        url: "/partner/extras/numeroSeguidores",
        success: function(res) {
            $("#cargaNumeroSeguidores").hide();
            $("#numeroSeguidores").text(res);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        },
    });

    $.ajax({
        type: "GET",
        url: "/partner/extras/puntosSocio",
        success: function(res) {
            console.log(res);
            $("#cargaPuntosSocio").hide();
            $("#puntosSocio").text(res);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        },
    });

})
</script>


@endsection