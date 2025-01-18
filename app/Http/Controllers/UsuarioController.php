<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function obtUsuario($id){
        $user = Usuario::find($id);
        if(!$user){
            return response()->json(['error'=>'usuario no encontrado'],'404');
        }

        return response()->json($user);
    }
    public function updateUsuario(){
        
    }

    
}
