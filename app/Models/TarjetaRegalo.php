<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class TarjetaRegalo extends Model
{
    protected $table = 'tarjetasRegalo';
    protected $primaryKey = 'IdTarjeta';
    protected $fillable = ['IdTarjeta','Monto'];
    public $timestamps = true; 
    
    public function Comprador()
    {
        return $this->belongsTo('App\Models\Usuario','Comprador');
    }

    public function Destinatario()
    {
        return $this->belongsTo('App\Models\Usuario','Destinatario');
    }
}
