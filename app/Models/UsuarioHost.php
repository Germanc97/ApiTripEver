<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioHost extends Model
{
    protected $table = 'usuarioHost';
    protected $primaryKey = 'IdHost';
    protected $fillable = ['IdHost','NoCuenta','MailHost','IdUsuario'];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('ApiTripEver\Models\Usuario','IdUsuario');
    }

    public function servicios()
    {
        return $this->hasMany('ApiTripEver\Models\Servicio','IdHost');
    }

}
