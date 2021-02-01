@extends('layouts.appAdmin')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="col-sm-12 col-md-10 col-lg-6">

            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Nuevo Paquete
                </div>

                <form action="{{route('admin.packages.store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Nombre Paquete</label>
                                    <input type="text" name="nombre"
                                        class="form-control form-control-sm inputCentrado{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                        value="{{old('nombre')}}">
                                    {!!$errors->first('nombre','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Puntos del Paquete</label>
                                    <input type="text" name="puntos"
                                        class="form-control form-control-sm form-control-sm inputCentrado{{ $errors->has('puntos') ? ' is-invalid' : '' }}"
                                        value="{{old('puntos')}}" id="puntos-paquete" readonly>
                                    {!!$errors->first('puntos','<span
                                        class="error invalid-feedback">:message</span>')!!}
                                </div>
                            </div>
                        </div>

                        <!-- TABLA DETALLES DEL NUEVO PAQUETE -->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm" id="tableDetallesPaquete">
                                <thead>
                                    <tr>
                                        <th class="filasTable">Nombre</th>
                                        <th class="filasTable">Puntos</th>
                                        <th class="filasTable">Precio</th>
                                        <th width="100px" class="filasTable">Cantidad</th>
                                        <th width="10px">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" align="center">Total Precio</td>
                                        <td colspan="2">
                                            <input type="text" value="0"
                                                class="form-control form-control-sm inputCentrado" id="total_precio"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="center">Total Puntos</td>
                                        <td colspan="2">
                                            <input type="text" value="0"
                                                class="form-control form-control-sm inputCentrado" id="total_puntos"
                                                readonly>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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
                                    <a href="{{route('admin.packages.index')}}" class="btn btn-danger btn-block btn-sm">
                                        <i class="fas fa-undo-alt"></i> Atras
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="col-sm-12 col-md-10 col-lg-6">
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="products" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="filasTable">ID</th>
                                    <th class="filasTable">Codigo</th>
                                    <th class="filasTable">Nombre</th>
                                    <th class="filasTable">Precio</th>
                                    <th class="filasTable">Puntos</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function() {
    $('#products').DataTable({
        // Consultando datos con AJAX
        "serverSide": true,
        "ajax": "{{url('api/packages/products')}}",
        "columns": [{
                data: 'id'
            },
            {
                data: 'codigoProducto'
            },
            {
                data: 'nombreProducto'
            },
            {
                data: 'precioProducto'
            },
            {
                data: 'puntosProducto'
            },
            {
                data: 'slugProducto',
            }
        ],

        // Traduciendo todas las ETIQUETAS DE LA TABLA EN ESPAÑOL
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando <b>_END_</b> registros de un total de <b>_TOTAL_</b> registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "<b>Buscar:</b>",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "<i class='fa fa-angle-right'></i>",
                "sPrevious": "<i class='fa fa-angle-left'></i>"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "responsive": true
    });
});
</script>


@endsection