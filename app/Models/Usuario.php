<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'IdUsuario';
    protected $fillable = ['IdUsuario','Nombre','Mail','Telefono','FechaNacimiento','TipoIdentificacion','NoIdentificacion','Usuario','Contrasena','Tipo'];
    public $timestamps = true;

    public function usuarioHost()
    {
        return $this->belongsTo('App\Models\UsuarioHost','IdUsuario');
    }

    public function cartera()
    {
        return $this->belongsTo('App\Models\Cartera','IdUsuario');
    }

    public function reserva()
    {
        return $this->hasMany('App\Models\Reserva','IdUsuario');
    }

    public function tarjetaRegaloDes()
    {
        return $this->hasMany('App\Models\TarjetaRegalo','IdUsuario');
    }

    public function tarjetaRegaloComp()
    {
        return $this->hasMany('App\Models\TarjetaRegalo','IdUsuario');
    }
    
}
