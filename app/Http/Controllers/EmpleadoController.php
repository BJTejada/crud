<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use App\Models\Usuario;

class EmpleadoController extends Controller
{
    public function index(){
        return view('empleado');
    }
    public function listarEmp(){
        $empleados = Empleado::all();
        return response()->json($empleados);
    }
    public function store(Request $request){

        $validado = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'fechaIngreso' => 'required|date',
            'usuario' => 'required|string|max:255|unique:usuario,usuario',
            'password' => 'required|string|min:6',
        ]);
        
        DB::beginTransaction();
        try{
            
            $usuario = new Usuario();
            $usuario->usuario = $validado['nombre'];
            $usuario->contraseña = $validado['password'];
            $usuario->save();
    
            /*
            $empleado = new Empleado();
            $empleado->nombre = $validado['nombre'];
            $empleado->apellido = $validado['apellido'];
            $empleado->puesto = $validado['puesto'];
            $empleado->salario = $validado['salario'];
            $empleado->fechaIngreso = $validado['fechaIngreso'];
            $empleado->idUsuario =$idUser;
            $empleado->activo = 1;*/
        } catch (\Exception $e){

        }

    }

}
