<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoReserva extends Model
{
    protected $table = 'estadoReserva';
    protected $primaryKey = 'IdEstado';
    protected $fillable = ['IdEstado','Estado'];
    public $timestamps = false;

    public function reserva()
    {
        return $this->hasMany('ApiTripEver\Models\Reserva','IdEstado');        
    }

}
