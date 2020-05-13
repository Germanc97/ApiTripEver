<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    protected $table = 'resena';
    protected $primaryKey = 'IdResena';
    protected $fillable = ['IdResena','Descripcion','Fecha','IdUsuario','IdServicio'];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo('ApiTripEver\Models\Usuario','IdUsuario');
    }

    public function servicio()
    {
        return $this->belongsTo('ApiTripEver\Models\Servicio','IdServicio');
    }

}
