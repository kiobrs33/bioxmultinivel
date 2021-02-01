@extends('layouts.appLogin')

@section('contenido')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">
            ¿Olvidaste tu contraseña? Aquí puede recuperar fácilmente una nueva contraseña.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Tu correo electronico">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-info btn-block">Solicitar nueva contraseña</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{route('login')}}">Iniciar Sesion</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection