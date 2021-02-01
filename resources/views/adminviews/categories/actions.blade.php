<!-- BOTONES DE ACCION PARA LA TABLA DE CATEGORIES -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.categories.show', $slugCategoria)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.categories.edit', $slugCategoria)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>