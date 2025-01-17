<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario'; 
    protected $primaryKey = 'idUsuario'; 
    public $timestamps = false; 

    protected $fillable = [
        'usuario',
        'contraseña',
        'activo',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'idUsuario', 'idUsuario');
    }
}
