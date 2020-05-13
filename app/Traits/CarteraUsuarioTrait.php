<?php

namespace ApiTripEver\Traits;

use ApiTripEver\Models\Cartera;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

trait CarteraUsuarioTrait {

    public function createCartera($IdUsuario)
    {
        try
        {
            $cartera = new Cartera();
            $cartera->Monto = 0; 
            $cartera->IdUsuario = $IdUsuario;
            $cartera->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e, 400);
        }
    }

    public function deleteCartera($IdUsuario)
    {   
        try
        {
            $cartera = Cartera::where("IdUsuario",$IdUsuario);
            $cartera->delete();
            return response(null,200);
        }
        catch(QueryException $e)
        {
            return response($e, 400);
        }
        catch(ModelNotFoundException $e)
        {
            return response($e,404);
        } 
    }  
}