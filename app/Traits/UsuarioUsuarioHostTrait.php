<?php

namespace ApiTripEver\Traits;

use ApiTripEver\Models\Usuario;
use ApiTripEver\Models\UsuarioHost;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

trait UsuarioUsuarioHostTrait {

    public function updateTipo($IdUsuario, $Valor)
    {
        try 
        {
            $usuario = Usuario::findOrFail($IdUsuario);
            $usuario->Tipo = $Valor;
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

    public function deleteHost($IdUsuario)#Recibe el Id del usuario padre
    {
        try
        {
            $usuarioHost = UsuarioHost::where("IdUsuario",$IdUsuario);
            $usuarioHost->delete();
            $this->updateTipo($IdUsuario,0);
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
    
}
