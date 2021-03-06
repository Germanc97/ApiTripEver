<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Lugar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class LugarController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $lugar = new Lugar();
            $lugar->Nombre = $request->Nombre;
            $lugar->Direccion = $request->Direccion;
            $lugar->Historia = $request->Historia;
            $lugar->Descripcion = $request->Descripcion;
            $lugar->IdLugar = $request->IdLugar;
            $lugar->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }         
    }

    public function delete($IdLugar)
    {
        try
        {
            $lugar = Usuario::findOrFail($IdLugar);
            $lugar->delete();
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

    public function getLugar($IdLugar)
    {
        try
        {
            $lugar = Usuario::findOrFail($IdLugar);
            return response($lugar,200);
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

    public function allLugares()
    {
        
        try
        {
            $lugar = Usuario::all();
            return response($lugar,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdUsuario )
    {
        try 
        {
            $table = Lugar::findOrFail($IdLugar);
            $lugar->Nombre = $request->Nombre;
            $lugar->Direccion = $request->Direccion;
            $lugar->Historia = $request->Historia;
            $lugar->Descripcion = $request->Descripcion;
            $lugar->IdLugar = $request->IdLugar;
            $lugar->save(); 
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