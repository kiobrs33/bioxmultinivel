<!-- BOTONES DE ACCION PARA LA TABLA DE TRABAJADORES -->
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a href="{{route('admin.employees.show', $slugTrabajador)}}" class="btn btn-info">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route('admin.employees.edit', $slugTrabajador)}}" class="btn btn-secondary">
        <i class="fas fa-edit"></i>
    </a>
</div>