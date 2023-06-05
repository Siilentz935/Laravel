<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'TableUsuarios'; // Nombre de la tabla en la base de datos
    
    protected $primaryKey = 'idUsuarios'; // Nombre de la clave primaria en la tabla
    
    protected $fillable = [
        'idStatus',
        'strNombre',
        'strApellidoPaterno',
        'strApellidoMaterno',
        'strLogin',
        'strPassword',
    ];
    
  /*  protected $hidden = [
        'strPassword', // Campo oculto para no mostrar la contraseña en las respuestas
    ];*/

}
