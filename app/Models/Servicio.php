<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'IdServicio';
    protected $fillable = ['IdServicio','Titulo','Pais','Cuidad','MaxPersonas','Descripcion','Precio','IdHost','IdTipoServicio'];
    public $timestamps = false;

    public function horario()
    {
        return $this->belongsTo('ApiTripEver\Models\Horario','IdHost');
    }

    public function usuarioHost()
    {
        return $this->belongsTo('ApiTripEver\Models\UsuarioHost','IdHost');
    }

    public function tipoServicio()
    {
        return $this->belongsTo('App\Models\TipoServicio','IdTipoServicio');
    }

    public function reserva()
    {
        return $this->hasMany('App\Models\Reserva','IdServicio');
    }

    public function hospedaje()
    {
        return $this->belongsTo('App\Models\Hospedaje','IdServicio');
    }

    public function resena()
    {
        return $this->hasMany('App\Models\Resena','IdServicio');
    }

    public function Actividad()
    {
        return $this->hasMany('App\Models\Actividad','IdServicio');
    }

}
