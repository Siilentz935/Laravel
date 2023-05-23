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
<ul>
    <li>
        <a href="{{route('insertComic')}}">Agregar Comics</a>
    </li>
</ul>
<table class="min-w-full table-auto">
    <caption>Listado de Comics</caption>
    <thead class="justify-between">
        <tr class="bg-gray-800">
            <th class="px-16 py-2"> <span class="text-gray-300">id</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Title</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Author</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Publisher</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Year</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Descripcion</span>
            <th class="px-16 py-2"> <span class="text-gray-300">Ver</span>
            </th>
            <th class="px-16 py-2"> <span class="text-gray-300">Borrar</span>
            </th>
        </tr>
    </thead>
    <tbody class="bg-gray-200">
    @forelse($comics as $comic)
        <tr class="bg-white border-4 border-gray-200">
            <td>{{$comic->id}}</td>
            <td>{{$comic->title}}</td>
            <td>{{$comic->author}}</td>
            <td>{{$comic->publisher}}</td>
            <td>{{$comic->year}}</td>
            <td>{{$comic->description}}</td>
            <td><a href="{{route('getComic',['id'=>$comic->id])}}">Editar</a></td>
            </tr>
    @empty
        <tr>
            <td>No data</td>
        </tr>
    @endforelse
    </tbody>
</table>