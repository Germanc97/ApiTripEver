<?php

namespace ApiTripEver\Http\Controllers;

use Illuminate\Http\Request;
use ApiTripEver\Models\Resena;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ResenaController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $resena = new Resena();
            $resena->Descripcion = $request->Descripcion;
            $resena->fecha = $request->fecha;
            $resena->IdUsuario = $request->IdUsuario;
            $resena->IdServicio = $request->IdServicio;           
            $resena->save();
            return response(null,201);     
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }        
    }

    public function delete($IdResena)
    {
        try
        {
            $resena = Resena::findOrFail($IdResena);
            $resena->delete();
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

    public function getResena($IdResena)
    {
        try
        {
            $resena = Resena::findOrFail($IdResena);
            return response($resena,200);
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

    public function allResenas()
    {
        
        try
        {
            $resena = Resena::all();
            return response($resena,200);
        }
        catch(QueryException $e)
        {
            return response($e,400);
        }
    }

    public function update(Request $request, $IdResena)
    {
        try 
        {
            $resena = Resena::findOrFail($IdResena);
            $resena->Descripcion = $request->Descripcion;
            $resena->fecha = $request->fecha;
            $resena->IdUsuario = $request->IdUsuario;
            $resena->IdServicio = $request->IdServicio;
            $resena->save(); 
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
