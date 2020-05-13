<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Horario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class HorarioController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $horario = new Horario();
            $horario->FechaInicio = $request->FechaInicio;
            $horario->Direccion = $request->Direccion;
            $horario->Historia = $request->Historia;
            $horario->Descripcion = $request->Descripcion;
            $horario->IdServicio = $request->IdServicio;           
            $horario->save();
            return response(null,201);     
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdHorario)
    {
        try
        {
            $horario = Horario::findOrFail($IdHorario);
            $horario->delete();
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

    public function getHorario($IdHorario)
    {
        try
        {
            $horario = Horario::findOrFail($IdHorario);
            return response($horario,200);
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

    public function allHorarios()
    {
        
        try
        {
            $horario = Horario::all();
            return response($horario,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdHorario)
    {
        try 
        {
            $horario = Horario::findOrFail($IdHorario);
            $horario->FechaInicio = $request->FechaInicio;
            $horario->Direccion = $request->Direccion;
            $horario->Historia = $request->Historia;
            $horario->Descripcion = $request->Descripcion;
            $horario->IdServicio = $request->IdServicio;            
            $horario->save();
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
