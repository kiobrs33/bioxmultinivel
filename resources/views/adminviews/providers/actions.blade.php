<!-- BOTONES DE ACCION PARA LA TABLA DE PROVEEDORES -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.providers.show', $slugProveedor)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.providers.edit', $slugProveedor)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>