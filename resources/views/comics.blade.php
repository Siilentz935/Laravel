<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de registro de Comic</title>
  <!-- Importamos la librería de estilos Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url('https://i.pinimg.com/736x/77/42/0d/77420df3f9e33db5b79ee25455d3340e.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    }

    /* Estilos para ajustar el formulario */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 95vh;
    }

    form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 3rem;
      border-radius: 1rem;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      max-width: 500px;
      width: 100%;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="{{$id != '' ? route('insertComic') : route('createComics')}}" method="POST">
        {{csrf_field()}}
      <h1 class="text-3xl font-bold mb-4">Registro de Comic</h1>
      <div class="mb-4">
    
        <input type="hidden" name="id" id="id" value = '{{$id}}'/>
        <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
        <input type="text" name="title" id="title" value = {{$title}} placeholder="Ingrese el título del comic" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="author" class="block text-gray-700 font-bold mb-2">Autor:</label>
        <input type="text" name="author" id="author" value = {{$author}} placeholder="Ingrese el autor del comic" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="publisher" class="block text-gray-700 font-bold mb-2">Editorial:</label>
        <input type="text" name="publisher" id="publisher" value = {{$publisher}} placeholder="Ingrese la editorial del comic" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="year" class="block text-gray-700 font-bold mb-2">Año de publicación:</label>
        <input type="number" name="year" id="year" value = {{$year}} placeholder="Ingrese el año de publicación del comic" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
        <textarea name="description" id="description" rows="3" placeholder="Ingrese una descripción del comic"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{$description}}</textarea>
      </div>
      <div class="mb-4">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Registrar
          Comic</button>
      </div>
    </form>
  </div>
</body>

</html>