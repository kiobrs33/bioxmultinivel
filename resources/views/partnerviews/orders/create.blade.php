@extends('layouts.appPartner')


@section('contenido-header')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-12 col-lg-12">
                <h1>Orden</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contenido')
<div class="container">
    <form action="{{route('partner.orders.store')}}" method="POST">

        {{ csrf_field() }}

        <input type="hidden" value="{{Auth()->user()->Socio->id}}" name="socio">

        <div class="row" id="contenedorProductos">
            <div class="col-md-7 col-lg-8">
                <div class="card card-info card-outline">
                    <div class="card-body m-0">
                        <h5 class="text-bold text-secondary">Productos</h5>
                        <div style="height:380px; overflow-y:scroll;">
                            <div class="row container-fluid">
                                @foreach($productos as $producto)
                                <div class="col-4 col-sm-3 col-md-4 col-lg-3 mt-3">
                                    <!-- INPUTS PARA JS -->
                                    <input type="hidden" value="{{$producto->id}}" class="id_producto">
                                    <input type="hidden" value="{{$producto->precioProducto}}" class="precio_producto">
                                    <input type="hidden" value="{{$producto->puntosProducto}}" class="puntos_producto">
                                    <input type="hidden" value="{{$producto->nombreProducto}}" class="nombre_producto">
                                    <input type="hidden" value="{{$producto->urlImagenProducto}}"
                                        class="imagen_producto">
                                    <input type="hidden" value="{{$producto->codigoProducto}}" class="codigo_producto">

                                    <!-- Informacion del Producto -->
                                    <img src=" {{$producto->urlImagenProducto}}" class="img-responsive border" alt="..."
                                        width="100%" height="100px" style="border-radius:5px">
                                    <p class="text-secondary text-sm text-bold m-0">{{$producto->nombreProducto}}</p>
                                    <p class="text-secondary text-sm m-0">{{$producto->puntosProducto}} pts</p>
                                    <p class="text-green text-sm text-bold m-0">S/ {{$producto->precioProducto}}</p>
                                    <button type="button"
                                        class="btn btn-outline-secondary btn-xs btn-block btn_addProducto">
                                        <i class="fas fa-plus"></i> Agregar</button>
                                </div>
                                @endforeach
                            </div>
                        </div>


                        
                    </div>
                </div>
            </div>

            <!-- RESUMEN CARRITO -->
            <div class="col-md-5 col-lg-4">
                <div class="card">
                <div class="card-header">Resumen</div>

                    <div class="card-body">
                        <!-- CONTENEDOR RESUMEN CARRITO -->
                        <div id="container-resumen-carrito" style="height:186px; overflow-y:scroll;">
                        </div>
                        <!-- FIN -->

                        <hr>

                        <!-- TOTAL PRECIO Y TOTAL PUNTOS -->
                        <div class="row">
                            <div class="col-6 col-lg-4">
                                <b class="text-secondary m-0">Total : </span></b>
                            </div>
                            <div class="col-6 col-lg-4">
                                <p class="m-0">S/<span id="totalPrecioCar">0</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-lg-4">
                                <b class="text-secondary m-0">Puntos : </b>
                            </div>
                            <div class="col-6 col-lg-4">
                                <p class="m-0" id="totalPuntosCar">0</p>
                            </div>
                        </div>
                        <!-- FIN -->

                        <hr>
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <button type="button" class="btn bg-gradient-primary btn-sm btn-block"
                                    id="btn_contenedorCarrito" style="border-radius:20px">
                                    <i class="fas fa-shopping-cart"></i> Ver carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-8">
                <div class="row">
                @foreach($productos as $producto)
                    <div class="col-4 col-sm-3 col-md-4 col-lg-3 mt-3">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{$producto->urlImagenProducto}}" width="100%" height="100px" alt="...">
                                <p class="text-secondary text-sm text-bold m-0">{{$producto->nombreProducto}}</p>
                                <p class="text-secondary text-sm m-0">{{$producto->puntosProducto}} pts</p>
                                <p class="text-green text-sm text-bold m-0">S/ {{$producto->precioProducto}}</p>
                                <button type="button"
                                class="btn btn-info btn-xs btn-block btn_addProducto">
                                <i class="fas fa-plus"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> -->

        <!-- CONTENEDOR CARRITO TABLE -->
        <div class="row" id="contenedorCarrito">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-bold text-secondary">Carrito</h5>
                        <div class="table-responsive">
                            <table class="table table-sm border" id="table-carrito">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th width="15%"></th>
                                        <th>Producto</th>
                                        <th class="text-center" width="15%">Cantidad</th>
                                        <th width="4%"></th>
                                        <th class="text-center" width="16%">Total Puntos</th>
                                        <th class="text-center" width="16%">Total Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <h5 class="text-bold text-secondary">Informacion</h5>
                        <div class="row justify-content-between">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Direccion">
                                </div>
                                <div class="form-group">
                                    <label>Fecha de entrega</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_entrega"
                                        placeholder="Fecha">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-4"><b>Subtotal</b></div>
                                    <div class="col-lg-8">S/<span id="subtotalPrecioTabla"> 0</span></div>
                                    <input type="hidden" name="subtotal" id="subtotal_precio_tabla">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4"><b>IGV</b></div>
                                    <div class="col-lg-8">S/<span id="igvTabla"> 0</span></div>
                                    <input type="hidden" name="impuesto" id="igv_tabla">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4"><b>Puntos</b></div>
                                    <div class="col-lg-8" id="totalPuntosTabla">0</div>
                                    <input type="hidden" name="total_puntos" id="total_puntos_tabla">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4"><b>Total</b></div>
                                    <div class="col-lg-8">S/<span id="totalPrecioTabla"> 0</span></div>
                                    <input type="hidden" name="total" id="total_precio_tabla">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-4 col-lg-2">
                                <button type="button" class="btn bg-gradient-danger btn-sm btn-block"
                                    id="btn_contenedorProductos" style="border-radius:20px">
                                    <i class="fas fa-arrow-left"></i> Ver productos</button>
                            </div>
                            <div class="col-4 col-lg-2">

                                <button type="submit" class="btn btn-primary btn-block btn-sm"
                                    style="border-radius:20px">
                                    <i class="fas fa-check"></i> Confirmar compra</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection