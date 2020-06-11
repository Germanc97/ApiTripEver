<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Hospedaje;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class HospedajeController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $hospedaje = new Hospedaje();
            $hospedaje->PrecioNoche = $request->PrecioNoche;
            $hospedaje->TipoAcomodacion = $request->TipoAcomodacion;
            $hospedaje->Direccion = $request->Direccion;
            $hospedaje->Barrio = $request->Barrio;           
            $hospedaje->EspecificacionDomicilio = $request->EspecificacionDomicilio;           
            $hospedaje->IdServicio = $request->IdServicio;
            $hospedaje->save();
            return response(null,201);     
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdHospedaje)
    {
        try
        {
            $hospedaje = Hospedaje::findOrFail($IdHospedaje);
            $hospedaje->delete();
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

    public function getHospedaje($IdHospedaje)
    {
        try
        {
            $hospedaje = Hospedaje::findOrFail($IdHospedaje);
            return response($hospedaje,200);
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

    public function allHospedajes()
    {
        
        try
        {
            $hospedaje = Hospedaje::all();
            return response($hospedaje,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdHospedaje)
    {
        try 
        {
            $hospedaje = Hospedaje::findOrFail($IdHospedaje);
            $hospedaje->PrecioNoche = $request->PrecioNoche;
            $hospedaje->TipoAcomodacion = $request->TipoAcomodacion;
            $hospedaje->Direccion = $request->Direccion;
            $hospedaje->Barrio = $request->Barrio;           
            $hospedaje->EspecificacionDomicilio = $request->EspecificacionDomicilio;           
            $hospedaje->IdServicio = $request->IdServicio;
            $hospedaje->save();
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
