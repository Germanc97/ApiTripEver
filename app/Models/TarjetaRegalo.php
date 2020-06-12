<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class TarjetaRegalo extends Model
{
    protected $table = 'tarjetasRegalo';
    protected $primaryKey = 'IdTarjeta';
    protected $fillable = ['IdTarjeta','NumTarjeta','Monto'];
    public $timestamps = false;
    
}
