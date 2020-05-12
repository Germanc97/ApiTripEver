<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Servicio;
use ApiTripEver\Models\Horario;
use ApiTripEver\Models\Hospedaje;
use ApiTripEver\Models\TipoServicio;
use ApiTripEver\Models\Actividad;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ServicioController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $servicio = new Servicio();
            $servicio->Titulo = $request->Titulo;
            $servicio->Pais = $request->Pais;
            $servicio->Cuidad = $request->Cuidad;
            $servicio->MaxPersonas = $request->MaxPersonas;
            $servicio->Descripcion = $request->Descripcion;
            $servicio->Precio = $request->Precio;
            $servicio->IdHorario = $request->IdHorario;
            $servicio->IdHost = $request->IdHost;
            $servicio->IdTipoServicio = $request->IdTipoServicio;
            $servicio->save();
            return response(null,201);
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
            $servicio->IdHorario = $request->IdHorario;
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

    public function createHorario(Request $request, $IdServicios)
    {
        try
        {
            $horario = new Horario($IdServicios);
            $horario->FechaInicio = $request->FechaInicio; 
            $horario->Direccion = $request->Direccion;
            $horario->Historia = $request->Historia;
            $horario->Descripcion = $request->Descripcion;
            $horario->IdServicio = $IdServicios;
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function createHospedaje(Request $request, $IdServicios)
    {
        try
        {
            $hospedaje = new Hospedaje();
            $hospedaje->PrecioNoche = $request->PrecioNoche;
            $hospedaje->TipoAcomodacion = $request->TipoAcomodacion;
            $hospedaje->Direccion = $request->Direccion;
            $hospedaje->Barrio = $request->Barrio;           
            $hospedaje->EspecificacionDomicilio = $request->EspecificacionDomicilio;           
            $hospedaje->IdServicio = $IdServicios;
            $hospedaje->save();
            return response(null,201);     
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function consultaTipoServicio($IdTipoServicio)
    {
        try
        {
            $tipoServicio = TipoServicio::with('NombreTipo')->findOrFail($IdTipoServicio);
            return response($tipoServicio,201);     
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function createActividad(Request $request, $IdServicios)
    {
        try
        {
            $actividades = new Actividad();
            $actividades->Nombre = $request->Nombre;
            $actividades->Duracion = $request->Duracion;
            $actividades->EdadMinima = $request->EdadMinima;
            $actividades->Descripcion = $request->Nombre;
            $actividades->Precio = $request->Precio;
            $actividades->IdServicio = $IdServicios;
            $actividades->save();
            return response(null,201);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

}
