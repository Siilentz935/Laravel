<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @isset($name)
    Hola {{$name}} {{$apellido1}} {{$apellido2}}
    @else
    Hola no esta definida
    @endisset
    <a href="{{route('parametro',['name'=>'Osman','apellido1'=>'Barrera','apellido2'=>'Juarez'])}}">lkjhgf</a>
  
</body>
</html>