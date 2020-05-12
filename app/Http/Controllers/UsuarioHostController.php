<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\UsuarioHost;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UsuarioHostController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $usuarioHost = new UsuarioHost();
            $usuarioHost->NoCuenta = $request->NoCuenta;
            $usuarioHost->Mail = $request->Mail;
            $usuarioHost->IdUsuario = $request->IdUsuario;
            $usuarioHost->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }

         
    }

    public function delete($IdHost)
    {
        try
        {
            $usuarioHost = UsuarioHost::findOrFail($IdHost);
            $usuarioHost->delete();
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

    public function getUsuario($IdHost)
    {
        try
        {
            $usuarioHost = UsuarioHost::findOrFail($IdHost);
            return response($usuarioHost,200);
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
            $usuarioHost = UsuarioHost::all();
            return response($usuarioHost,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdHost )
    {
        try 
        {
            $usuarioHost = UsuarioHost::findOrFail($IdHost);
            $usuarioHost->NoCuenta = $request->NoCuenta;
            $usuarioHost->Mail = $request->Mail;
            $usuarioHost->IdUsuario = $request->IdUsuario;
            $usuarioHost->save(); 
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
