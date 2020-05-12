<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    protected $table = 'hospedaje';
    protected $primaryKey = 'IdHospedaje';
    protected $fillable = ['IdHospedaje','PrecioNoche','TipoAcomodacion','Direccion','Barrio','EspecificacionDomicilio'];
    public $timestamps = true; 

    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio','IdServicio');
    }
}