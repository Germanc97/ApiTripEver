<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Actividad;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ActividadController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $actividades = new Actividad();
            $actividades->Nombre = $request->Nombre;
            $actividades->Duracion = $request->Duracion;
            $actividades->EdadMinima = $request->EdadMinima;
            $actividades->Descripcion = $request->Nombre;
            $actividades->Precio = $request->Precio;
            $actividades->IdServicio = $request->IdServicio;
            $actividades->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdActividad)
    {
        try
        {
            $actividades = Actividad::findOrFail($IdActividad);
            $actividades->delete();
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

    public function getActvidad($IdActividad)
    {
        try
        {
            $actividades = Actividad::findOrFail($IdActividad);
            return response($actividades,200);
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

    public function allActividades()
    {
        
        try
        {
            $actividades = Actividad::all();
            return response($actividades,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdActividad)
    {
        try 
        {
            $actividades = Actividad::findOrFail($IdActividad);
            $actividades->Nombre = $request->Nombre;
            $actividades->Duracion = $request->Duracion;
            $actividades->EdadMinima = $request->EdadMinima;
            $actividades->Descripcion = $request->Nombre;
            $actividades->Precio = $request->Precio;
            $actividades->IdServicio = $request->IdServicio;
            $actividades->save();
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
