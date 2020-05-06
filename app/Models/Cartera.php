<?php

namespace ApiTripEver\Models;

use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    protected $table = 'cartera';
    protected $primaryKey = 'IdCartera';
    protected $fillable = ['IdCartera','Monto'];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario','IdUsuario');
    }

}