<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioHost extends Model
{
    protected $table = 'usuarioHost';
    protected $primaryKey = 'IdHost';
    protected $fillable = ['IdHost','NoCuenta','Mail','IdUsuario'];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario','IdUsuario');
    }

    public function servicios()
    {
        return $this->hasMany('App\Models\Servicio','IdHost');
    }

}
