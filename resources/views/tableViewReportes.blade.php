@extends('templates.generalTemplate')
@section('content')
<style>

    .tab-btn.active {
        /* Estilos para la pestaña seleccionada */
        background-color: #38a169; /* Cambia el color de fondo al seleccionado */
        font-weight: bold; /* Cambia la fuente en negrita al seleccionado */
    }
</style>
<div class="py-8">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">                    
                    <div class="flex justify-center mb-4">
                        <form action="{{ route('logs') }}" method="GET" class="flex items-center">
                            <div class="flex items-center mr-4 border">
                                <label for="ipO" class="mr-2">Por IP Origen:</label>
                                <input type="text" name="ipO" id="ipO" placeholder="Ingrese una IP" value="{{ request('ipO') }}">
                            </div>
                      
                            <div class="flex items-center mr-4 border">
                                <label for="ipD" class="mr-2"> IP Destino:</label>
                                <input type="text" name="ipD" id="ipD" placeholder="Filtrar Destino" value="{{ request('ipD') }}">
                            </div>
                      
                            <div class="flex items-center mr-4 border">
                                <label for="pD" class="mr-2"> Puerto Destino:</label>
                                <input type="text" name="pD" id="pD" placeholder="Filtrar por Destino" value="{{ request('pD') }}">
                            </div>
                          
                            <div class="flex items-center mr-4 border">
                                <label for="pO" class="mr-2"> Puerto Origen:</label>
                                <input type="text" name="pO" id="pO" placeholder="Filtrar por Origen" value="{{ request('pO') }}">
                            </div>

                            <div class="flex items-center mr-4 border">
                                <label for="se" class="mr-2">Nivel de Severidad:</label>
                                <input type="text" name="se" id="se" placeholder="Filtrar por Severidad" value="{{ request('se') }}">
                            </div>
                            <div class="flex items-center mr-4 border">
                                <label for="order" class="mr-2">Orden Listado:</label>
                                <select name="order" id="order">
                                <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>Ascendente</option>
                                <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>Descendente</option>
                                </select>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Filtrar</button>
                                <button id="limpiar-filtros-btn" type="button" class="mx-5 w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline">Limpiar Filtros</button>
                            </div>
                           
                              
                        </form>
                    </div>
                    <nav class="flex">
                        <a class="tab-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-t mr-1 active">Alertas</a>
                        <a class="tab-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-t mr-1">Falsos</a>
                        <a class="tab-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-t">Incidentes</a>
                    </nav>
                    

                
                      


    <style>
        .tab-content:not(:target) {
            display: none;
        }
    </style>
   <div id="alertas" class="tab-content mt-4" style="display: block;">
    <h2 class="text-xl font-bold">Tabla de Alertas</h2>
   <table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="border">Id</th>
            <th class="border">Acceso</th>
            <th class="border">Num paquete</th>
            <th class="border">GrupoId</th>
            <th class="border">ReglaId</th>
            <th class="border">Severidad</th>
            <th class="border">Mensaje</th>
            <th class="border">Servicio</th>
            <th class="border">Ip Origen</th>
            <th class="border">Puerto Origen</th>
            <th class="border">Ip Destino</th>
            <th class="border">Puerto Destino</th>
            <th class="border">Solucionar</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $dato)
        @if ( $dato->falso_positivo == 'no' && !$dato->incidencia)
        <tr>
            <td>{{ $dato->id }}</td>
            <td>{{ $dato->action }}</td>
            <td>{{ $dato->pkt_num }}</td>
            <td>{{ $dato->gid }}</td>
            <td>{{ $dato->sid }}</td>
            <td>{{ $dato->rev }}</td>
            <td>{{ $dato->msg }}</td>
            <td>{{ $dato->service }}</td>
            <td>{{ $dato->src_addr }}</td>
            <td>{{ $dato->src_port }}</td>
            <td>{{ $dato->dst_addr }}</td>
            <td>{{ $dato->dst_port }}</td>
            <td class="border">
                <a href="{{ route('updateAlert', ['id' => $dato->id]) }}" class="text-blue-500 hover:text-blue-700 font-bold">Solucionar</a>
            </td>            
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

{{ $logs->links() }}
   </div>

                    </div>
                    <div id="falsos" class="tab-content mt-4">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="border">Id</th>
                                    <th class="border">Acceso</th>
                                    <th class="border">Num paquete</th>
                                    <th class="border">GrupoId</th>
                                    <th class="border">ReglaId</th>
                                    <th class="border">Severidad</th>
                                    <th class="border">Mensaje</th>
                                    <th class="border">Servicio</th>
                                    <th class="border">Ip Origen</th>
                                    <th class="border">Puerto Origen</th>
                                    <th class="border">Ip Destino</th>
                                    <th class="border">Puerto Destino</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logsSinPaginar as $dato)
                                @if ( $dato->falso_positivo == 'si' && !$dato->incidencia)
                                <tr>
                                    <td>{{ $dato->id }}</td>
                                    <td>{{ $dato->action }}</td>
                                    <td>{{ $dato->pkt_num }}</td>
                                    <td>{{ $dato->gid }}</td>
                                    <td>{{ $dato->sid }}</td>
                                    <td>{{ $dato->rev }}</td>
                                    <td>{{ $dato->msg }}</td>
                                    <td>{{ $dato->service }}</td>
                                    <td>{{ $dato->src_addr }}</td>
                                    <td>{{ $dato->src_port }}</td>
                                    <td>{{ $dato->dst_addr }}</td>
                                    <td>{{ $dato->dst_port }}</td>            
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>

                    <div id="incidentes" class="tab-content mt-4">
                        <table class="min-w-full bg-white">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="border">Id</th>
                                        <th class="border">Acceso</th>
                                        <th class="border">Num paquete</th>
                                        <th class="border">GrupoId</th>
                                        <th class="border">ReglaId</th>
                                        <th class="border">Severidad</th>
                                        <th class="border">Mensaje</th>
                                        <th class="border">Procedimiento para arreglar</th>
                                        <th class="border">Servicio</th>
                                        <th class="border">Ip Origen</th>
                                        <th class="border">Puerto Origen</th>
                                        <th class="border">Ip Destino</th>
                                        <th class="border">Puerto Destino</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logsSinPaginar as $dato)
                                    @if ( $dato->falso_positivo == 'no' && $dato->incidencia)
                                    <tr>
                                        <td>{{ $dato->id }}</td>
                                        <td>{{ $dato->action }}</td>
                                        <td>{{ $dato->pkt_num }}</td>
                                        <td>{{ $dato->gid }}</td>
                                        <td>{{ $dato->sid }}</td>
                                        <td>{{ $dato->rev }}</td>
                                        <td>{{ $dato->msg }}</td>
                                        <td x-data="{ isOpen: false }">
                                            <!-- Botón de activación del dropdown -->
                                            <button @click="isOpen = !isOpen" class="px-4 py-2 bg-gray-400 text-white">Descripcion</button>
                                            
                                            <!-- Contenido del dropdown -->
                                            <div x-show="isOpen" @click.away="isOpen = false" class="mt-2 bg-white border border-gray-200 rounded-lg shadow-md">
                                              <!-- Opciones del dropdown -->
                                             <p>{{$dato->solucion}}</p>
                                            </div>
                                          </div>
                                        </td>  
                                        
                                        <td>{{ $dato->service }}</td>
                                        <td>{{ $dato->src_addr }}</td>
                                        <td>{{ $dato->src_port }}</td>
                                        <td>{{ $dato->dst_addr }}</td>
                                        <td>{{ $dato->dst_port }}</td>           
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    // Obtener el botón "Limpiar Filtros" por su ID
    const limpiarFiltrosBtn = document.getElementById('limpiar-filtros-btn');

    // Agregar el evento de clic al botón
    limpiarFiltrosBtn.addEventListener('click', () => {
        // Obtener el formulario
        const form = document.querySelector('form');

        // Obtener todos los inputs de los filtros por su nombre
        const inputs = document.querySelectorAll('input[name^="ip"], input[name^="p"], input[name^="se"],input[name^="order"]');

        // Limpiar el contenido de los inputs
        inputs.forEach(input => input.value = '');
            // Limpiar la selección del campo de orden
        const orderSelect = document.querySelector('select[name="order"]');
        orderSelect.selectedIndex = 0;
        // Enviar el formulario
        form.submit();
    });


        // Obtener todas las pestañas y sus respectivos contenidos
        const tabs = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        // Agregar el evento de clic a cada pestaña
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Desactivar todas las pestañas y ocultar sus contenidos
                tabs.forEach((tab) => tab.classList.remove('active'));
                tabContents.forEach((content) => content.style.display = 'none');

                // Activar la pestaña seleccionada y mostrar su contenido
                tab.classList.add('active');
                tabContents[index].style.display = 'block';
            });
        });
    </script>
@stop

