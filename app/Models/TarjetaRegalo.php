<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class TarjetaRegalo extends Model
{
    protected $table = 'tarjetasRegalo';
    protected $primaryKey = 'IdTarjeta';
    protected $fillable = ['IdTarjeta','Monto'];
    public $timestamps = false;
    
    public function Comprador()
    {
        return $this->belongsTo('ApiTripEver\Models\Usuario','Comprador');
    }

    public function Destinatario()
    {
        return $this->belongsTo('ApiTripEver\Models\Usuario','Destinatario');
    }
}
