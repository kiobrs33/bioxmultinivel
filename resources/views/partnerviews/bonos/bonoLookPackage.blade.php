@extends('partnerviews.bonos.containerBonos')
@section('contenidoBono')
<div class="card">
    <div class="card-body">
        <h3>Bono por Paquete</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="bg-maroon text-center rounded">
                    <h2 class="m-0" id="puntos"></h2>
                    <div class="spinner-border m-2 text-white" style="width:44px; height:44px" id="cargaPuntosSocio"
                        role="status">
                    </div>
                    <span class="text-xs" id="infoPuntos">Puntos en el mes.</span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="bg-blue text-center rounded">
                    <h2 class="m-0">S/ {{$bonoTotal}} soles</h2>
                    <span class="text-xs">Dinero acumulado.</span>
                </div>
            </div>
        </div>
        <hr>

    </div>
</div>
<script>
var PuntosText = $("#puntos");
var InfoPuntosText = $("#infoPuntos");

$(document).ready(function() {

    PuntosText.hide();
    InfoPuntosText.hide();

    $.ajax({
        type: "GET",
        url: "/partner/extras/puntosSocio",
        success: function(res) {
            $("#cargaPuntosSocio").hide();

            PuntosText.text(res);
            PuntosText.show();
            InfoPuntosText.show();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Error Ajax");
        },
    });
})
</script>
@endsection