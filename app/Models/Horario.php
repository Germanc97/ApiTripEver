<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'IdHorario';
    protected $fillable = ['IdHorario','FechaInicio','FechaFin','HoraInicio','HoraFin','IdServicio'];
    public $timestamps = true;

    public function servicio()
    {
        return $this->belongsTo('ApiTripEver\Models\Servicio','IdServicio');
    }

}
