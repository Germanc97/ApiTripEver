<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    protected $table = 'cartera';
    protected $primaryKey = 'IdCartera';
    protected $fillable = ['IdCartera','Monto','IdUsuario'];
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('ApiTripEver\Models\Usuario','IdUsuario');
    }

}