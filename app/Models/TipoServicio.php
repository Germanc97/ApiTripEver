<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tipoServicio';
    protected $primaryKey = 'IdTipoServicio';
    protected $fillable = ['IdTipoServicio','NombreTipo'];
    public $timestamps = true;

    public function reserva()
    {
        return $this->hasMany('ApiTripEver\Models\Servicio','IdTipoServicio');        
    }

    public function servicio()
    {
        return $this->hasMany('ApiTripEver\Models\Servicio','IdTipoServicio');
    }

}

