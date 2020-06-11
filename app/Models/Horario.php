<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'IdHorario';
    protected $fillable = ['IdHorario','FechaInicio','FechaFin','HoraInicio','HoraFin','IdHost'];
    public $timestamps = false;

    public function servicio()
    {
        return $this->belongsTo('ApiTripEver\Models\Servicio','IdHost');
    }

}
