<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use App\Models\Usuario;
use PhpParser\Node\Expr\Empty_;
use Illuminate\Validation\Rule;

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
            $usuario->usuario = $validado['usuario'];
            $usuario->contraseña = bcrypt($validado['password']);
            $usuario->activo = 1;
            $usuario->save();
    
            $empleado = new Empleado();
            $empleado->nombre = $validado['nombre'];
            $empleado->apellido = $validado['apellido'];
            $empleado->puesto = $validado['puesto'];
            $empleado->salario = $validado['salario'];
            $empleado->fechaIngreso = $validado['fechaIngreso'];
            $empleado->idUsuario =$usuario->idUsuario;
            $empleado->activo = 1;
            $empleado->save();

            DB::commit();
            
            return response()->json(['message' => 'Empleado y usuario creados con éxito']);
        } catch (\Exception $e){

        }

    }

    public function update(Request $request){
        $usuarioActual = Usuario::find($request->idUser);
        $empac = Empleado::find($request->id);
        if (!$empac) {
            return response()->json(['message' => 'emp no encontrado.','empid' => $request->id,], 404);
        }
        if (!$usuarioActual) {
            return response()->json(['message' => 'Usuario no encontrado.','idUsuario' => $request->idUser,], 404);
        }

        $validado = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'fechaIngreso' => 'required|date',
            'usuario' => [
                'required',
                'string',
                Rule::unique('usuario', 'usuario')->ignore($usuarioActual->idUsuario, 'idUsuario'),
            ],
            'password' => 'nullable|string|min:6',
        ]);
        DB::beginTransaction();
        try{
            $empleado = Empleado::find($request->id);
            $empleado->nombre = $validado['nombre'];
            $empleado->apellido = $validado['apellido'];
            $empleado->puesto = $validado['puesto'];
            $empleado->salario = $validado['salario'];
            $empleado->fechaIngreso = $validado['fechaIngreso'];
            $empleado->save();

            $usuario = Usuario::find($request->idUser);
            $usuario->usuario = $validado['usuario'];
            if(!empty($validado['password'])){
                $usuario->contraseña = bcrypt($validado['password']);
            }
            $usuario->save();
            DB::commit();
            return response()->json(['message' => 'Empleado y usuario actualizados con éxito']);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Error al actualizar los datos',
                'error' => $e->getMessage(), // Detalles del error
                'code' => $e->getCode(),     // Código del error (si lo deseas)
            ], 500);
        }
    }

}
