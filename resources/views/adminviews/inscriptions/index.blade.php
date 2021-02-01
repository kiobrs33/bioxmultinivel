@extends('layouts.appAdmin')

@section('contenido')
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr style="background-color:#E8C6E8">
                    <th class="filasTable">ID</th>
                    <th class="filasTable">Fecha Registro</th>
                    <th class="filasTable">Total Venta</th>
                    <th class="filasTable">Subtotal Venta</th>
                    <th class="filasTable">Impuesto</th>
                    <th class="filasTable">Puntos</th>
                    <th width="100px">
                        <a href="{{route('admin.inscriptions.create')}}" class="btn btn-success btn-block btn-sm"><i
                                class="fas fa-plus-circle"></i> Nuevo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscripciones as $insc)
                <tr>
                    <td class="filasTable">{{$insc->id}}</td>
                    <td class="filasTable">{{$insc->fecha_registro}}</td>
                    <td class="filasTable">{{$insc->total_venta}}</td>
                    <td class="filasTable">{{$insc->subtotal_venta}}</td>
                    <td class="filasTable">{{$insc->impuesto}}</td>
                    <td class="filasTable">{{$insc->puntaje_total}}</td>
                    <td align="center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{route('admin.inscriptions.show', $insc->slug)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{route('admin.inscriptions.edit', $insc->slug)}}" class="btn btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        {{ $inscripciones->links("pagination::bootstrap-4") }}
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

@endsection