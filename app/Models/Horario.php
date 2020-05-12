<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'IdHorario';
    protected $fillable = ['IdHorario','FechaInicio','Direccion','Historia','Descripcion','IdServicio'];
    public $timestamps = true;

    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio','IdServicio');
    }

}
