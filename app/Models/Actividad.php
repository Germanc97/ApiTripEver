<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $primaryKey = 'IdActividad';
    protected $fillable = ['IdActividad','Nombre','Duracion','EdadMinima','Descripcion','Precio','IdServicio'];
    public $timestamps = false;

    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio','IdServicio');
    }

    public function lugar()
    {
        return $this->belongsTo('ApiTripEver\Models\Lugar','IdActividad');
    }
}
