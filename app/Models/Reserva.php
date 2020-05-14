<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $primaryKey = 'IdReserva';
    protected $fillable = ['IdReserva','numPersonas','IdEstado','IdUsuario','IdServicios'];
    public $timestamps = false;


    public function estadoReserva()
    {
        return $this->belongsTo('ApiTripEver\Models\EstadoReserva','IdEstado');
    }

    public function usuario()
    {
        return $this->belongsTo('ApiTripEver\Models\Usuario','IdUsuario');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio','IdServicios');
    }

}
