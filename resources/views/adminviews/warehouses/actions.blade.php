<!-- BOTONES DE ACCION PARA LA TABLA DE WAREHOUSES -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.warehouses.show', $slugAlmacen)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.warehouses.edit', $slugAlmacen)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>