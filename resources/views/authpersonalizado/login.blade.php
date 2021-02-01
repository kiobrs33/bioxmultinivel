@extends('layouts.appLogin')

@section('contenido')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Inicia sesion</p>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{ old('name') }}" placeholder="Usuario">
                @if ($errors->has('name'))
                <span class="error invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña">
                @if ($errors->has('password'))
                <span class="error invalid-feedback">
                    {{ $errors->first('password') }}
                </span>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-info btn-block">Sign In</button>
                </div>
            </div>
        </form>


        <p class="mt-3 mb-1">
            <a href="{{ route('password.request') }}">Olvide mi constraseña</a>
        </p>

    </div>
    <!-- /.login-card-body -->
</div>
@endsection