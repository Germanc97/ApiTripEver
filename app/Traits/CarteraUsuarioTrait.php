<?php

namespace ApiTripEver\Traits;

use ApiTripEver\Models\Cartera;

trait CarteraUsuarioTrait {

    public function createCartera($IdUsuario)
    {
        $cartera = new Cartera();
        $cartera->Monto = 0; 
        $cartera->IdUsuario = $IdUsuario;
        $cartera->save();
        return response(null,201);
    }
}