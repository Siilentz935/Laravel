<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $table = 'TableBitacoraUsuarios'; // Nombre de la tabla en la base de datos
    
    protected $primaryKey = 'id'; // Nombre de la clave primaria en la tabla
    
    protected $fillable = [
        'usuarioResponsable',
        'accion',
        'idUsuarios',
        'idStatus',
        'strNombre',
        'strApellidoPaterno',
        'strApellidoMaterno',
        'strLogin',
        'strPassword',
    ];
}
