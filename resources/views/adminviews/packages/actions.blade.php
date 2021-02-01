<!-- BOTONES DE ACCION PARA LA TABLA DE PACKAGES -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.packages.show', $slugPaquete)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.packages.edit', $slugPaquete)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>