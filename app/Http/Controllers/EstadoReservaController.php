<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\EstadoReserva;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class EstadoReservaController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $estadoReserva = new EstadoReserva();
            $estadoReserva->IdEstado = $request->IdEstado;
            $estadoReserva->Estado = $request->Estado;
            $estadoReserva->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }

         
    }

    public function delete($IdEstado)
    {
        try
        {
            $estadoReserva = EstadoReserva::findOrFail($IdEstado);
            $estadoReserva->delete();
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

    public function getEstadoReserva($IdEstado)
    {
        try
        {
            $estadoReserva = EstadoReserva::findOrFail($IdEstado);
            return response($estadoReserva,200);
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

    public function allEstadoReserva()
    {
        
        try
        {
            $estadoReserva = EstadoReserva::all();
            return response($estadoReserva,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdEstado )
    {
        try 
        {
            $estadoReserva = EstadoReserva::findOrFail($IdEstado);
            $estadoReserva = new EstadoReserva();
            $estadoReserva->IdEstado = $request->IdEstado;
            $estadoReserva->Estado = $request->Estado;
            $estadoReserva->save();  
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
