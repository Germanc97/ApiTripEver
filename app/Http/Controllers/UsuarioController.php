<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Usuario;
use ApiTripEver\Models\Cartera;
use ApiTripEver\Traits\CarteraUsuarioTrait;
use ApiTripEver\Traits\UsuarioUsuarioHostTrait;
use ApiTripEver\Http\Controllers\CarteraController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    use CarteraUsuarioTrait;
    use UsuarioUsuarioHostTrait;

    public function create(Request $request)
    {
        try
        {
            $usuario = new Usuario();
            $usuario2 = new Usuario();
            $usuario->Nombre = $request->Nombre;
            $usuario->Mail = $request->Mail;
            $usuario->Telefono = $request->Telefono;
            $usuario->FechaNacimiento = $request->FechaNacimiento;
            $usuario->TipoIdentificacion = $request->TipoIdentificacion;
            $usuario->NoIdentificacion = $request->NoIdentificacion;
            $usuario->Usuario = $request->Usuario;
            $usuario->Contrasena = $request->Contrasena;
            $usuario->Tipo = $request->Tipo;
            $usuario2 = Usuario::select('usuario.*')->where('Usuario','=',$usuario->Usuario)->first();
            if ($usuario2 == null) {
                $usuario->save();
                $response = response($usuario,200);
                $response = $this->createCartera($usuario->IdUsuario);    
            }
            else{
                return response(null,404);
            }
                    
            return $response;
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }         
    }

    public function delete($IdUsuario)
    {
        try
        {
            $usuario = Usuario::findOrFail($IdUsuario);
            $usuario->delete();
            return response(null,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
        catch(ModelNotFoundException $e)
        {
            return response($e,404);
        }        
    }

    public function getUsuario($IdUsuario)
    {
        try
        {
            $usuario = Usuario::findOrFail($IdUsuario);
            return response($usuario,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
        catch(ModelNotFoundException $e)
        {
            return response(null,404);
        }         
    }
    public function getUsuarioName($NameUsuario)
    {
        try
        {
            $usuario = Usuario::where('Nombre','=',$NameUsuario)->first();
            return response($usuario,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
        catch(ModelNotFoundException $e)
        {
            return response(null,404);
        }         
    }

    public function getUsuarioByUserContra($NameUsuario, $ContraUsuario)
    {
        try
        {
            $usuario = Usuario::join('cartera','usuario.IdUsuario','=','cartera.IdUsuario')
            ->where('Usuario','=',$NameUsuario)->where('Contrasena','=', $ContraUsuario)
            ->select('usuario.*', 'cartera.*')->first();
            if ($usuario != null) {
                return response($usuario,200);
            }
            else{
                return response(null,404);
            }
            
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
        catch(ModelNotFoundException $e)
        {
            return response(null,404);
        }         
    }

    public function allUsuarios()
    {        
        try
        {
            $usuario = Usuario::all();
            return response($usuario,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdUsuario)
    {
        try 
        {
            $usuario = Usuario::findOrFail($IdUsuario);
            $usuario->Nombre = $request->Nombre;
            $usuario->Mail = $request->Mail;
            $usuario->FechaNacimiento = $request->FechaNacimiento;
            $usuario->TipoIdentificacion = $request->TipoIdentificacion;
            $usuario->NoIdentificacion = $request->NoIdentificacion;
            $usuario->Usuario = $request->Usuario;
            $usuario->Contrasena = $request->Contrasena;
            $usuario->Tipo = $request->Tipo;
            $usuario->save(); 
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
        catch(ModelNotFoundException $e)
        {
            return response($e,404);
        }        
    }

    public function updateUser(Request $request, $IdUsuario)
    {
        try 
        {
            $usuario = Usuario::findOrFail($IdUsuario);
            $usuario->Mail = $request->Mail;
            $usuario->Telefono = $request->Telefono;
            $usuario->Contrasena = $request->Contrasena;
            $usuario->Tipo = $request->Tipo;
            $usuario->save(); 
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
        catch(ModelNotFoundException $e)
        {
            return response($e,404);
        }        
    }
}
