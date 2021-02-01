<!-- BOTONES DE ACCION PARA LA TABLA DE PRODUCTOS -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.products.show', $slugProducto)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.products.edit', $slugProducto)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>