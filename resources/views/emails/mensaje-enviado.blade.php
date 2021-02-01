<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcion Biox</title>
</head>
<body>
    <h4>Inscripcion Satisfactoria!</h4>
    Bienvenida(o) {{$credenciales['nombresSocio']}}

    <ul>
        <li>Tu codigo de usuario es : {{$credenciales['username']}}</li>
        <li>Tu contraseña es : {{$credenciales['password']}}</li>
    </ul>
    
    
</body>
</html>