@extends('partnerviews.containerOrganization')
@section('contenidoInscription')
<div class="callout callout-info">
    <h5><i class="fas fa-door-open"></i> Bienvenido al visor de arbol uninivel!</h5>
</div>
<div class="card">
    <div class="card-body">

        @foreach($misSocios as $position=>$valor)
        <!-- ACCIENDO A LA INFORMACION DEL LIDER -->
        @if($position == 0)
        <!-- Con esta condicion controlamos cuando el USARIO MOSTRADO EN EL ARBOL ES EL LOGUEADO  -->
        <!-- En el caso no lo sea APARECERA UN BOTON para subir de nivel en el arbol -->
        <!-- ISSET nos permite saber si una VARIABLE ESTA DEFINIDA Y NO ES NULL -->
        @if(!isset($misSocios[0][0]->slug_lider))
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card" style="border-radius:10px; background: radial-gradient(white,#75D81B)">
                    <div class="card-body">
                        <h6 class="text-center text-sm">Codigo :
                            <b>{{$misSocios[0][0]->username}}</b>
                        </h6>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <img class="profile-user-img img-fluid img-circle img-md" src="/images/imagenVacia.png"
                                    alt="User profile picture">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h6 align="center" class="text-sm">
                                    {{$misSocios[0][0]->nombresSocio.' '.$misSocios[0][0]->apellidoPaternoSocio.' '.$misSocios[0][0]->apellidoMaternoSocio}}
                                </h6>
                            </div>
                        </div>
                        <h6 class="text-center text-sm"><b><i class="fas fa-crown"></i> Lider <i
                                    class="fas fa-crown"></i></b></h6>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card" style="border-radius:10px; background: radial-gradient(white,#FF870F)">
                    <div class="card-body">
                        <h6 align="center" class="text-sm mt-1">Codigo :
                            <b>{{$misSocios[0][0]->username}}</b>
                        </h6>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <img class="profile-user-img img-fluid img-circle img-md" src="/images/imagenVacia.png"
                                    alt="User profile picture">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h6 align="center" class="text-sm">
                                    {{$misSocios[0][0]->nombresSocio.' '.$misSocios[0][0]->apellidoPaternoSocio.' '.$misSocios[0][0]->apellidoMaternoSocio}}
                                </h6>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <a href="{{route('partner.partners.tree-partners',$misSocios[0][0]->slug_lider)}}"
                                    class="btn btn-info btn-xs btn-block" style="border-radius:10px;">
                                    <i class="fas fa-arrow-up"></i> Subir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @else
        <div style="display:flex; overflow-x:auto;">
            <!-- ENLISTADO LOS SOCIOS DIRECTOS -->
            @foreach($misSocios[$position] as $item)
            <div style="min-width:130px; margin:5px;">
                <div class="card" style="border-radius:10px; background: radial-gradient(white,#17A2B8)">
                    <div class="card-body">
                        <h6 align="center" class="text-sm"><b>{{$item->username}}</b></h6>
                        <p class="text-sm">{{$item->telefonoSocio}}</p>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <img class="profile-user-img img-fluid img-circle img-md" src="/images/imagenVacia.png"
                                    alt="User profile picture">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h6 align="center" class="text-xs">
                                    {{$item->nombresSocio}}
                                </h6>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <a href="{{route('partner.partners.tree-partners',$item->slugSocio)}}"
                                    class="btn btn-success btn-xs btn-block" style="border-radius:10px;">
                                    <i class="fas fa-eye"></i> Ver Arbol
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @endif
        @endforeach

    </div>
</div>

<div class="card">
    <div class="card-body">
    </div>
</div>
@endsection