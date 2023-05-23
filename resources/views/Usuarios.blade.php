<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de registro de Usuario</title>
  <!-- Importamos la librería de estilos Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url('https://wallpaperaccess.com/full/16668.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    }

    /* Estilos para ajustar el formulario */
    .container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 3rem;
      border-radius: 1rem;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50%;
      margin: 10%;
      width: 40%;
    }

   
  </style>
</head>
<body>
  <div class="container mx-auto max-w-sm">
    <form class="flex flex-col h-full" action="{{$idUsuarios != '' ? route('updateUsuario') : route('insertUsuario')}}" method="POST">
        {{csrf_field()}}
      <h1 class="text-3xl font-bold mb-4">Registro de Usuario</h1>
      <div class="mb-4">
        <input type="hidden" name="idUsuarios" id="idUsuarios" value = "{{$idUsuarios}}"/>
        <label for="title" class="block text-gray-700 font-bold mb-2">Estatus:</label>
        <label class="inline-flex items-center">
          <input type="radio" name="idStatus" value="Activo" {{ $idStatus == 'Activo' ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
          <span class="ml-2">Activo</span>
        </label>
        <label class="inline-flex items-center ml-6">
          <input type="radio" name="idStatus" value="Inactivo" {{ $idStatus == 'Inactivo' ? 'checked' : '' }} class="form-radio h-5 w-5 text-red-600">
          <span class="ml-2">Inactivo</span>
        </label>
      </div>
      <div class="mb-4">
        <label for="strNombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
        <input type="text" name="strNombre" id="strNombre" value = "{{$strNombre}}" placeholder="Ingrese el nombre del usuario" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="strApellidoPaterno" class="block text-gray-700 font-bold mb-2">Apellido Paterno:</label>
        <input type="text" name="strApellidoPaterno" id="strApellidoPaterno" value = "{{$strApellidoPaterno}}" placeholder="Ingrese el Apellido Paterno" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="strApellidoMaterno" class="block text-gray-700 font-bold mb-2">Apellido Materno:</label>
        <input type="text" name="strApellidoMaterno" id="strApellidoMaterno" value = "{{$strApellidoMaterno}}" placeholder="Ingrese el Apellido Materno" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="strLogin" class="block text-gray-700 font-bold mb-2">Correo</label>
        <input type="text" name="strLogin" id="strLogin" value = "{{$strLogin}}" placeholder="Ingrese el nuevo correo" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <label for="strPassword" class="block text-gray-700 font-bold mb-2">Contraseña</label>
        <input type="password" name="strPassword" id="strPassword" value = "{{$strPassword}}" placeholder="Ingrese la nueva contraseña" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Registrar
          Usuario</button>
      </div>
    </form>
  </div>
</body>

</html>