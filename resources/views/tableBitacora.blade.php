@extends('templates.templateTables')

@section('title', 'Listado de Bitacoras Usuarios')

@section('table')

    <table class="min-w-full table-auto">
        <thead class="justify-between">
            <tr class="bg-gray-800">
                <th class="px-16 py-2"> <span class="text-gray-300">Usuario Responsable</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Accion Realizada</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Id del Usuario</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Nombre del Usuario</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Cuenta Usuario</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300">Fecha</span> </th>
                <th class="px-16 py-2"> <span class="text-gray-300"></span> </th>
            </tr>
        </thead>
        <tbody class="bg-gray-200 justify-between">
            @forelse($usuarios as $usuario)
           
                    <tr class="bg-white border-4 border-gray-200">
                        <td>{{ $usuario->usuarioResponsable }}</td>
                        <td>{{ $usuario->accion }}</td>
                        <td>{{ $usuario->idUsuarios }}</td>
                        <td>{{ $usuario->strApellidoPaterno }} {{ $usuario->strApellidoMaterno }}</td>
                        <td>{{ $usuario->strNombre }}</td>
                        <td>{{ $usuario->strLogin }}</td>
                        <td>{{ $usuario->created_at }}</td>
                    </tr>
            @empty
                <tr>
                    <td>No data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('content')
<ul class="flex">
    <li class="mr-4">
        <a href="{{ route('getUsuarios') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
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
