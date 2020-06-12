<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\TarjetaRegalo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class TarjetaRegaloController extends Controller
{
    public function getTarjeta($NumTarjeta)
    {
        try
        {
            $tarjetaRegalo = TarjetaRegalo::where('NumTarjeta','=',$NumTarjeta)->first();
            return response($tarjetaRegalo,200);
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


    
}
