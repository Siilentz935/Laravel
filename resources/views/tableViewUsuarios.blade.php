@extends('templates.templateTables')


@section('title', 'Listado de Usuarios')
@section('table')
<style>
    .password-cell {
  position: relative;
  cursor: pointer;
  white-space: nowrap;
  width: max-content;
}

.password-cell::after {
  content: attr(data-password);
  position: absolute;
  top: 0;
  left: 0;
  padding: 0px;
  background-color: white;
  color: black;
  font-weight: bold;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s ease-in-out;
  white-space: nowrap;
  width: 100%;
}

.password-cell:hover::after {
  visibility: visible;
  opacity: 1;
}

</style>
@if ($errors->any())
<div class="bg-red-500 text-white p-4 mb-4">
  <p>{{ $errors->first() }}</p>
</div>
@endif
    <table class="min-w-full table-auto">
        <thead class="justify-between">
            <tr class="bg-gray-800">
                <th class="px-16 py-2"> <span class="text-gray-300">id</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Nombre</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Apellido</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Correo</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Password</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Ver</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Borrar</span> </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200 justify-between">
            @forelse($usuarios as $usuario)
                @if ($usuario->idStatus == "Active" || $usuario->idStatus == "Activo" )
                    <tr class="bg-white border-4 border-gray-200">
                        <td>{{ $usuario->idUsuarios }}</td>
                        <td>{{ $usuario->strNombre }}</td>
                        <td>{{ $usuario->strApellidoPaterno }} {{ $usuario->strApellidoMaterno }}</td>
                        <td>{{ $usuario->strLogin }}</td>
                        <td class="password-cell" data-password="{{ $usuario->strPassword }}">••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••</td>
                        <td style="vertical-align:middle; text-align: center">
                            <a href="{{ route('getUsuario',['idUsuarios'=>$usuario->idUsuarios]) }}">
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" style="display: inline-block;">
                                    <path d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z" fill-rule="nonzero"/>
                                </svg>
                            </a>
                        </td>
                        <td style="vertical-align:middle; text-align: center">
                            <form action="{{ route('borrarUsuario',['idUsuarios'=>$usuario->idUsuarios]) }}" method="POST">
                                @csrf
                                <button type="button" onclick="confirmDelete(this.form, '<?= $usuario->strNombre ?>')">
                                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" style="display: inline-block;">
                                        <path d="M19 24h-14c-1.104 0-2-.896-2-2v-17h-1v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2h-1v17c0 1.104-.896 2-2 2zm0-19h-14v16.5c0 .276.224.5.5.5h13c.276 0 .5-.224.5-.5v-16.5zm-9 4c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm-2-7h-4v1h4v-1z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endif
            @empty
                <tr>
                    <td>No data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('content')
    <br>
    <ul class="flex">
        <li class="mr-4">
            <a href="{{ route('registerUsuario') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar Usuario</a>
        </li>
        <li>
            <a href="{{ route('bitacoras') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ver Bitácoras</a>
        </li>
    </ul>
    

    <script>
        // Función de confirmación de eliminación
        function confirmDelete(form,nombre) {
            Swal.fire({
                title: '¿Estás seguro? Eliminaras a '+nombre,
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario
                    form.submit();
                }
            });
        };
    </script>
@endsection
