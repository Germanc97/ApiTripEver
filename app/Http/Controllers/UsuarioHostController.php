<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\UsuarioHost;
use ApiTripEver\Traits\UsuarioUsuarioHostTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UsuarioHostController extends Controller
{
    use UsuarioUsuarioHostTrait;
   
    public function create(Request $request)
    {
        try
        {
            $usuarioHost = new UsuarioHost();
            $usuarioHost->NoCuenta = $request->NoCuenta;
            $usuarioHost->MailHost = $request->MailHost;
            $usuarioHost->IdUsuario = $request->IdUsuario;
            if (UsuarioHost::select('usuarioHost.IdUsuario')
            ->where('IdUsuario','=', $usuarioHost->IdUsuario)->first() == null){
                $usuarioHost->save();
                $response = $this->updateTipo($usuarioHost->IdUsuario,1); 
            }
            else{
                $response = response(null,404);
            }
            
            return $response;
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdUsuario)#Recibe el Id del usuario padre
    {       
        $response = $this->deleteHost($IdUsuario);
        return $response;
    }

    public function getUsuario($IdUsuario)
    {
        try
        {
            $usuarioHost = UsuarioHost::where('IdUsuario','=',$IdUsuario)->first();
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
            $usuarioHost->MailHost = $request->MailHost;
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
