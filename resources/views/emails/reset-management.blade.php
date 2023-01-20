<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Recuperacion de clave exitosa</h1>
    <a href="http://127.0.0.1:8000/dashboard">Haga click aqui para ingresar</a>
    <br>
    usuario: {{$user->email}}
    <br>
    contraseña: {{$user->pass_dec}}
</body>
</html>
