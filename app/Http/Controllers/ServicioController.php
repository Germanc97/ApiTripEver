<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Servicio;
use ApiTripEver\Models\Horario;
use ApiTripEver\Models\Hospedaje;
use ApiTripEver\Models\TipoServicio;
use ApiTripEver\Traits\ServicioHorarioTrait;
use ApiTripEver\Models\Actividad;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ServicioController extends Controller
{
    use ServicioHorarioTrait;

    public function create(Request $request)
    {
        try
        {
            $servicio = new Servicio();
            $servicio->Titulo = $request->Titulo;
            $servicio->Pais = $request->Pais;
            $servicio->Ciudad = $request->Ciudad;
            $servicio->MaxPersonas = $request->MaxPersonas;
            $servicio->Descripcion = $request->Descripcion;
            $servicio->Precio = $request->Precio;
            $servicio->IdHost = $request->IdHost;
            $servicio->IdTipoServicio = $request->IdTipoServicio;
            $servicio->save();
            $response = $this->CreateHorario($request,$servicio->IdServicio);
            return response($response,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
       
    }

    public function delete($IdServicios)
    {
        try
        {
            $servicio = Servicio::findOrFail($IdServicios);
            $servicio->delete();
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

    public function getServicio($IdServicios)
    {
        try
        {
            $servicio = Servicio::findOrFail($IdServicios);
            return response($servicio,200);
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

    public function allServicios()
    {
        
        try
        {
            $servicio = Servicio::all();
            return response($servicio,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdServicios )
    {
        try 
        {
            $servicio = Servicio::findOrFail($IdServicios);
            $servicio->Titulo = $request->Titulo;
            $servicio->Pais = $request->Pais;
            $servicio->Cuidad = $request->Cuidad;
            $servicio->MaxPersonas = $request->MaxPersonas;
            $servicio->Descripcion = $request->Descripcion;
            $servicio->Precio = $request->Precio;
            $servicio->IdHost = $request->IdHost;
            $servicio->IdTipoServicio = $request->IdTipoServicio;
            $servicio->save(); 
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
