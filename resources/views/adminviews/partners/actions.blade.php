<!-- BOTONES DE ACCION PARA LA TABLA DE PARTNERS -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.partners.show', $slugSocio)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.partners.edit', $slugSocio)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>