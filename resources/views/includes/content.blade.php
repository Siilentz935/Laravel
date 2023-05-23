<style>
  body {
    background-image: url('https://wallpaperaccess.com/full/2314950.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  }
</style>

<div class="flex items-center justify-center h-screen">
  <div class="bg-gray-100 p-6 rounded-md m-2 p-4">
    <h1 class="text-3xl text-center">Panel de Administrador</h1>
  </div>
  <div class="m-2 p-4">
    <form action="{{route('formularioValidar')}}" method="post" class="bg-gray-100 p-6 rounded-md">
      {{csrf_field()}}

      <div class="flex flex-col mb-4">
        <label for="user" class="mb-1">Usuario</label>
        <input type="text" name="user" id="user" @isset($user) value="{{$user}}" @endisset placeholder="Usuario" class="py-2 px-4 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <div class="flex flex-col mb-4">
        <label for="pass" class="mb-1">Contraseña</label>
        <input type="password" name="pass" id="pass" @isset($pass) value="{{$pass}}" @endisset placeholder="Contraseña" class="py-2 px-4 border rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
      </div>

      <div>
        <button type="submit" class="bg-teal-500 text-white py-2 px-4 rounded-md focus:outline-none hover:bg-teal-600">Ingresar</button>
      </div>
    </form>
  </div>
</div>
