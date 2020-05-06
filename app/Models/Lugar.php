<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'lugar';
    protected $primaryKey = 'IdLugar';
    protected $fillable = ['IdLugar','Nombre','Direccion','Historia','Descripcion'];
    public $timestamps = true; 
    
    public function actividad()
    {
        return $this->belongsTo('App\Models\Actividad','IdActividad');
    }
}
