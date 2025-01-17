<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'puesto',
        'salario',
        'fechaIngreso',
        'idUsuario',
        'activo'
    ];
    protected $primaryKey = 'idEmpleado';
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
