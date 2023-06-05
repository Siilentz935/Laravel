<!-- log.blade.php -->
@extends('templates.generalTemplate')
@section('content')
    <div class="flex justify-center">
        <div class="w-1/2 bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Información del Log</h1>
            
            <div class="mb-4">
                <span class="font-bold">Acción:</span>
                <span>{{ $log->action }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Número de Paquete:</span>
                <span>{{ $log->pkt_num }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">GID:</span>
                <span>{{ $log->gid }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">SID:</span>
                <span>{{ $log->sid }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Rev:</span>
                <span>{{ $log->rev }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Mensaje:</span>
                <span>{{ $log->msg }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Servicio:</span>
                <span>{{ $log->service }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Dirección de Origen:</span>
                <span>{{ $log->src_addr }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Puerto de Origen:</span>
                <span>{{ $log->src_port }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Dirección de Destino:</span>
                <span>{{ $log->dst_addr }}</span>
            </div>
            
            <div class="mb-4">
                <span class="font-bold">Puerto de Destino:</span>
                <span>{{ $log->dst_port }}</span>
            </div>
          
            <form action="{{ route('postUpdateAlert') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value={{ $log->id }} class="mr-2">
                
                <div class="mb-4">
                    <label class="font-bold">Falso Positivo:</label>
                    <div class="flex items-center">
                        <input type="radio" name="falso_positivo" value="si" {{ $log->falso_positivo === 'si' ? 'checked' : '' }} class="mr-2" onchange="toggleElements(this)">
                        <span class="mr-4">Sí</span>
                        
                        <input type="radio" name="falso_positivo" value="no" {{ $log->falso_positivo === 'no' ? 'checked' : '' }} class="mr-2" onchange="toggleElements(this)">
                        <span>No</span>
                    </div>
                </div>
                
                <div class="mb-4" id="solucionContainer" style="{{ $log->falso_positivo === 'si' ? 'display: none' : '' }}">
                    <label class="font-bold">Solución:</label>
                    <textarea name="solucion" class="border border-gray-300 rounded-md px-3 py-2">{{ $log->solucion }}</textarea>
                </div>
                
                <button type="button" onclick="confirmUpdate(this.form,'Cambiaras de Estado la Alerta')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </form>
            
            <script>
                function toggleElements(radio) {
                    var solucionContainer = document.getElementById('solucionContainer');
                    var incidenciaContainer = document.getElementById('incidenciaContainer');
                    
                    if (radio.value === 'si') {
                        solucionContainer.style.display = 'none';
                        incidenciaContainer.style.display = 'none';
                    } else {
                        solucionContainer.style.display = '';
                        incidenciaContainer.style.display = '';
                    }
                }
           
            
                    // Función de confirmación de eliminación
                    function confirmUpdate(form,accion) {
                        Swal.fire({
                            title: '¿Estás seguro? '+accion,
                            text: '¡No podrás revertir esto!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sí'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Si el usuario confirma, envía el formulario
                                form.submit();
                            }
                        });
                    };
                </script>
            
            
            <div class="mt-6">
                <a href="{{ route('logs') }}" class="text-blue-500 hover:underline">Volver</a>
            </div>
        </div>
    </div>
@stop
