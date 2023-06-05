<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de registro de Usuario</title>
  <!-- Importamos la librería de estilos Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style>
    body {
      background-image: url('https://wallpaperaccess.com/full/16668.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
    }
    .container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 3rem;
      border-radius: 1rem;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      display: flex;
      align-items: center;
      height: 45%;
      margin: 10%;
      width: 40%;
      flex-wrap: wrap; /* Permite envolver los elementos en caso de falta de espacio horizontal */
    }

    .button-container {
      display: flex;
      width: 100%;
      margin-top: 1rem;
      margin-left: auto; /* Alinea el botón a la derecha */
    }

    .button-container a {
      width: fit-content;
    }

   
  </style>
</head>
<body>
  @if ($errors->any())
    <div class="bg-red-500 text-white p-4 mb-4">
      <p>{{ $errors->first() }}</p>
    </div>
    @endif
  <div class="container mx-auto max-w-sm">
    
    <form class="flex flex-col h-full" action="{{$idUsuarios != '' ? route('updateUsuario') : route('insertUsuario')}}" method="POST">
        {{csrf_field()}}
      <h1 class="text-3xl font-bold mb-4">{{$idUsuarios != '' ? 'Actualizar':'Registrar'}} Usuario</h1>
      <div class="mb-4">
        <input type="hidden" name="idUsuarios" id="idUsuarios" value = "{{$idUsuarios}}"/>
        <label for="title" class="block text-gray-700 font-bold mb-2">Estatus:</label>
       
        @foreach ( $opciones as $status )
        <label class="inline-flex items-center">
          <input type="radio" name="idStatus" value={{$status}} {{ $idStatus == $status ? 'checked' : '' }} class="form-radio h-5 w-5 text-blue-600">
          <span class="ml-2">{{$status}}</span>
        </label>
        @endforeach
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
        <label for="strPassword" class="block text-gray-700 font-bold mb-2">Contraseña Nueva</label>
        <input type="password" name="strPassword" id="strPassword" value = "" placeholder="Ingrese la nueva contraseña" required
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
      </div>
      <div class="mb-4">
        <button type="button"  onclick="confirmDelete(this.form,'<?= $idUsuarios?>')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded focus:outline-none focus:shadow-outline">{{$idUsuarios == ''? "Agregar" : "Actualizar"}} Usuario</button>
      </div>
    </form>
    <div class="button-container">
      <a href="{{ route('getUsuarios') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline">Volver</a>
    </div>
  </div>
 
  </div>
  <script>
    // Función de confirmación de eliminación
    function confirmDelete(form,action) {
      console.log(action);
      Swal.fire({
        title: (action == 0 ? "Agregar" : "Actualizar") +' Usuario ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              // Si el usuario confirma, envía el formulario
              form.submit();
            }
          });
        };
      </script>
</body>

</html>