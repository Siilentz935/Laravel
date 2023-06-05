<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'TableLogs';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'action',
        'pkt_num',
        'gid',
        'sid',
        'rev',
        'msg',
        'service',
        'src_addr',
        'src_port',
        'dst_addr',
        'dst_port',
        'solucion',
        'falso_positivo',
        'incidencia',
    ];

    protected $casts = [
        'incidencia' => 'boolean',
    ];

    
}
