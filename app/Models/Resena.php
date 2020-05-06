<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    protected $table = 'resena';
    protected $primaryKey = 'IdResena';
    protected $fillable = ['IdResena','Descripcion','Fecha'];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario','IdUsuario');
    }

    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio','IdServicio');
    }

}
