<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Reserva;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ReservaController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $reserva = new Reserva();
            $reserva->numPersonas = $request->numPersonas;
            $reserva->IdEstado = $request->IdEstado;
            $reserva->IdUsuario = $request->IdUsuario;
            $reserva->IdServicio = $request->IdServicio;
            $reserva->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdReserva)
    {
        try
        {
            $reserva = Reserva::findOrFail($IdReserva);
            $reserva->delete();
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

    public function getReserva($IdReserva)
    {
        try
        {
            $reserva = Reserva::findOrFail($IdReserva);
            return response($reserva,200);
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

    public function allReservas()
    {
        
        try
        {
            $reserva = Reserva::all();
            return response($reserva,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdReserva)
    {
        try 
        {
            $reserva = Reserva::findOrFail($IdReserva);
            $reserva->numPersonas = $request->numPersonas;
            $reserva->IdEstado = $request->IdEstado;
            $reserva->IdUsuario = $request->IdUsuario;
            $reserva->IdServicio = $request->IdServicio;
            $reserva->save(); 
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