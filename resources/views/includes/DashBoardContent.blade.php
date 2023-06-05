@section('DashBoard')
<body class="bg-gray-100">
    <h1 class="text-3xl font-bold text-center mt-8">Dashboard</h1>
    <div class=" mx-auto px-4 mt-8">
        <div class=" mx-auto px-4 mt-8 h-25">
            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Alertas</h2>
                <p class="text-lg">Cantidad: {{$totalAllLogs}}</p>
            </div>
            <div class="overflow-x-auto h-full">
                <table class="w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-blue-500 text-white">Id</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Acceso</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Num paquete</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">GrupoId</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">ReglaId</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Severidad</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Mensaje</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Servicio</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Ip Origen</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Puerto Origen</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Ip Destino</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Puerto Destino</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allLogs as $dato)
                        <tr>
                            <td class="px-4 py-2 border">{{ $dato->id }}</td>
                            <td class="px-4 py-2 border">{{ $dato->action }}</td>
                            <td class="px-4 py-2 border">{{ $dato->pkt_num }}</td>
                            <td class="px-4 py-2 border">{{ $dato->gid }}</td>
                            <td class="px-4 py-2 border">{{ $dato->sid }}</td>
                            <td class="px-4 py-2 border">{{ $dato->rev }}</td>
                            <td class="px-4 py-2 border">{{ $dato->msg }}</td>
                            <td class="px-4 py-2 border">{{ $dato->service }}</td>
                            <td class="px-4 py-2 border">{{ $dato->src_addr }}</td>
                            <td class="px-4 py-2 border">{{ $dato->src_port }}</td>
                            <td class="px-4 py-2 border">{{ $dato->dst_addr }}</td>
                            <td class="px-4 py-2 border">{{ $dato->dst_port }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 mt-8 flex justify-center">
            <div class="w-1/2 pr-2">
                <div class="mb-4">
                    <h2 class="text-xl font-bold mb-2">Falso Positivos</h2>
                    <p class="text-lg">Cantidad: {{$totalFalsoPositivoLogs}}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-blue-500 text-white">Id</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Acceso</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Num paquete</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">GrupoId</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">ReglaId</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Severidad</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Mensaje</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Servicio</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Ip Origen</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Puerto Origen</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Ip Destino</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Puerto Destino</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($falsoPositivoLogs as $dato)
                        <tr>
                            <td class="px-4 py-2 border">{{ $dato->id }}</td>
                            <td class="px-4 py-2 border">{{ $dato->action }}</td>
                            <td class="px-4 py-2 border">{{ $dato->pkt_num }}</td>
                            <td class="px-4 py-2 border">{{ $dato->gid }}</td>
                            <td class="px-4 py-2 border">{{ $dato->sid }}</td>
                            <td class="px-4 py-2 border">{{ $dato->rev }}</td>
                            <td class="px-4 py-2 border">{{ $dato->msg }}</td>
                            <td class="px-4 py-2 border">{{ $dato->service }}</td>
                            <td class="px-4 py-2 border">{{ $dato->src_addr }}</td>
                            <td class="px-4 py-2 border">{{ $dato->src_port }}</td>
                            <td class="px-4 py-2 border">{{ $dato->dst_addr }}</td>
                            <td class="px-4 py-2 border">{{ $dato->dst_port }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
      
    <div class="w-3/2 pl-2">
        <div class="mb-4">
            <h2 class="text-xl font-bold mb-2">Incidencias</h2>
            <p class="text-lg">Cantidad: {{$totalIncidenciaLogs}}</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-700 rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-blue-500 text-white">Id</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Acceso</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Num paquete</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">GrupoId</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">ReglaId</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Severidad</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Mensaje</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Servicio</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Ip Origen</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Puerto Origen</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Ip Destino</th>
                            <th class="px-4 py-2 bg-blue-500 text-white">Puerto Destino</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($incidenciaLogs as $dato)
                        <tr>
                            <td class="px-4 py-2 border">{{ $dato->id }}</td>
                            <td class="px-4 py-2 border">{{ $dato->action }}</td>
                            <td class="px-4 py-2 border">{{ $dato->pkt_num }}</td>
                            <td class="px-4 py-2 border">{{ $dato->gid }}</td>
                            <td class="px-4 py-2 border">{{ $dato->sid }}</td>
                            <td class="px-4 py-2 border">{{ $dato->rev }}</td>
                            <td class="px-4 py-2 border">{{ $dato->msg }}</td>
                            <td class="px-4 py-2 border">{{ $dato->service }}</td>
                            <td class="px-4 py-2 border">{{ $dato->src_addr }}</td>
                            <td class="px-4 py-2 border">{{ $dato->src_port }}</td>
                            <td class="px-4 py-2 border">{{ $dato->dst_addr }}</td>
                            <td class="px-4 py-2 border">{{ $dato->dst_port }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <!-- Agrega tu contenido adicional aquí -->
    
</body>
@show
