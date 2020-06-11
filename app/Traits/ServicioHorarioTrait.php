<?php

namespace ApiTripEver\Traits;

use ApiTripEver\Models\Horario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

trait ServicioHorarioTrait {

    public function CreateHorario(Request $request,$IdServicio)
    {
        try
        {
            $horario = new Horario();
            $horario->FechaInicio = $request->FechaInicio;
            $horario->FechaFin = $request->FechaFin;
            $horario->HoraInicio = $request->HoraInicio;
            $horario->HoraFin = $request->HoraFin;
            $horario->IdServicio = $IdServicio;           
            $horario->save();
            return response(null,201);     
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }    
}

