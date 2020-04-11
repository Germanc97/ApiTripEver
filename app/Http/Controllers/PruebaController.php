<?php

namespace ApiTripEver\Http\Controllers;

use ApiTripEver\Http\Controllers\Controller;

class PruebaController extends Controller {
    public function prueba($param){
        return 'Estoy dentro del controlador '. $param;
    }
}