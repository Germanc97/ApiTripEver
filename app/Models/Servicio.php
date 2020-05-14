<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $primaryKey = 'IdServicios';
    protected $fillable = ['IdServicios','Titulo','Pais','Cuidad','MaxPersonas','Descripcion','Precio','IdHost','IdTipoServicio'];
    public $timestamps = true;

    public function horario()
    {
        return $this->belongsTo('ApiTripEver\Models\Horario','IdServicios');
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
        return $this->hasMany('App\Models\Reserva','IdServicios');
    }

    public function hospedaje()
    {
        return $this->belongsTo('App\Models\Hospedaje','IdServicios');
    }

    public function resena()
    {
        return $this->hasMany('App\Models\Resena','IdServicios');
    }

    public function Actividad()
    {
        return $this->hasMany('App\Models\Actividad','IdServicios');
    }




}
