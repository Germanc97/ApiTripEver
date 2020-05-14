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
            $usuario->Nombre = $request->Nombre;
            $usuario->Mail = $request->Mail;
            $usuario->Telefono = $request->Telefono;
            $usuario->FechaNacimiento = $request->FechaNacimiento;
            $usuario->TipoIdentificacion = $request->TipoIdentificacion;
            $usuario->NoIdentificacion = $request->NoIdentificacion;
            $usuario->Usuario = $request->Usuario;
            $usuario->Contrasena = $request->Contrasena;
            $usuario->Tipo = $request->Tipo;
            $usuario->save();
            $this->createCartera($usuario->IdUsuario);            
            return response(null,201);
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
            $this->deleteCartera($IdUsuario);
            $this->deleteHost($IdUsuario);
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
}
