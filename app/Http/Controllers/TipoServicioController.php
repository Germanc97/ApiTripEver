<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\TipoServicio;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class TipoServicioController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $tipoServicio = new TipoServicio();
            $tipoServicio->IdTipoServicio = $request->IdTipoServicio;
            $tipoServicio->NombreTipo = $request->NombreTipo;
            $usuario->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }

         
    }

    public function delete($IdTipoServicio)
    {
        try
        {
            $tipoServicio = TipoServicio::findOrFail($IdTipoServicio);
            $tipoServicio->delete();
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

    public function getTipoServicio($IdTipoServicio)
    {
        try
        {
            $tipoServicio = TipoServicio::findOrFail($IdTipoServicio);
            return response($tipoServicio,200);
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
            $tipoServicio = TipoServicio::all();
            return response($tipoServicio,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdTipoServicio )
    {
        try 
        {
            $tipoServicio = TipoServicio::findOrFail($IdTipoServicio);
            $tipoServicio->IdTipoServicio = $request->IdTipoServicio;
            $tipoServicio->NombreTipo = $request->NombreTipo;
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
