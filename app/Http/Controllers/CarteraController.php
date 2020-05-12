<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Cartera;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class CarteraController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $cartera = new Cartera();
            $cartera->Monto = $request->Monto;
            $cartera->IdUsuario = $request->IdUsuario;
            $cartera->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdCartera)
    {
        try
        {
            $cartera = Cartera::findOrFail($IdCartera);
            $cartera->delete();
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
    
    public function getCartera($IdCartera)
    {
        try
        {
            $cartera = Cartera::findOrFail($IdCartera);
            return response($cartera,200);
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

    public function allCarteras()
    {
        
        try
        {
            $cartera = Cartera::all();
            return response($cartera,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdCartera)
    {
        try 
        {
            $cartera = Usuario::findOrFail($IdCartera);
            $cartera->Monto = $request->Monto;
            $cartera->IdUsuario = $request->IdUsuario;
            $cartera->save(); 
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
