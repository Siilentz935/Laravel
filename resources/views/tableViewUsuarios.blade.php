<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de registro de Comic</title>
  <!-- Importamos la librería de estilos Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>

  </style>
</head>

<table class="min-w-full table-auto">
    <caption>Listado de Comics</caption>
    <thead class="justify-between">
        <tr class="bg-gray-800">
            <th class="px-16 py-2"> <span class="text-gray-300">id</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Nombre</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Apellido</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Correo</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Password</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Ver</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Borrar</span>
            </th>
        </tr>
    </thead>
    <tbody class="bg-gray-200">
    @forelse($usuarios as $usuario)
        <tr class="bg-white border-4 border-gray-200">
            <td>{{$usuario->idUsuarios}}</td>
            <td>{{$usuario->strNombre}}</td>
            <td>{{$usuario->strApellidoPaterno}} {{$usuario->strApellidoMaterno}}</td>
            <td>{{$usuario->strLogin}}</td>
            <td>{{$usuario->strPassword}}</td>
            <td><a href="{{route('getUsuario',['idUsuarios'=>$usuario->idUsuarios])}}">Editar</a></td>
            <td>
                <form action="{{route('borrarUsuario',['idUsuarios'=>$usuario->idUsuarios])}}" method="POST">
                    {{ csrf_field() }}
                  
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Borrar</button>
                </form>
            </td>
            </tr>
    @empty
        <tr>
            <td>No data</td>
        </tr>
    @endforelse
    </tbody>
    
</table>
<br>
    <ul>
        <li>
            <a href="{{ route('registerUsuario') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar Usuario</a>
    
        </li>
    </ul>