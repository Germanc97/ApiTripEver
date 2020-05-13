<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    protected $table = 'hospedaje';
    protected $primaryKey = 'IdHospedaje';
    protected $fillable = ['IdHospedaje','PrecioNoche','TipoAcomodacion','Direccion','Barrio','EspecificacionDomicilio','IdServicio'];
    public $timestamps = true; 

    public function servicio()
    {
        return $this->belongsTo('ApiTripEver\Models\Servicio','IdServicio');
    }
}