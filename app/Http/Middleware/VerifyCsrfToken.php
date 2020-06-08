<?php

namespace ApiTripEver\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "/createUsuario",
        "/getUsuario/*",
        "/getUsuarios",
        "/updateUsuario/*",
        "/deleteUsuario/*",
        "/createHost",
        "/getHost/*",
        "/getAllHost",
        "/updateHost/*",
        "/deleteHost/*",
        "/createServicio",
        "/getServicio/*",
        "/getServicios",
        "/updateServicio/*",
        "/deleteServicio/*",
        "/createReserva",
        "/getReserva/*",
        "/getReservas",
        "/updateReserva/*",
        "/deleteReserva/*",
        "/createResena",
        "/getResena/*",
        "/getResenas",
        "/updateResena/*",
        "/deleteResena/*",
        "/createHospedaje",
        "/getHospedaje/*",
        "/getHospedajes",
        "/updateHospedaje/*",
        "/deleteHospedaje/*",
        "/createHorario",
        "/getHorario/*",
        "/getHorarios",
        "/updateHorario/*",
        "/deleteHorario/*",
        "/createCartera",
        "/getCartera/*",
        "/getCarteras",
        "/updateCartera/*",
        "/deleteCartera/*",
        "/createActividad",
        "/getActividad/*",
        "/getActividades",
        "/updateActividad/*",
        "/deleteActividad/*",
        "/createEstadoReserva",
        "/getEstadoReserva/*",
        "/getEstadoReserva",
        "/updateEstadoReserva/*",
        "/deleteEstadoReserva/*",
        "/createLugar",
        "/deleteLugar/*",
        "/getLugar/*",
        "/getLugar",
        "/updateLugar/*",
        "/createTipoServicio",
        "/deleteTipoServicio/*",
        "/getTipoServicio/*",
        "/getTipoServicio",
        "/updateTipoServicio/*",
        "/getUsuarioName/*",
        "/getUsuarioByUserContra/*",
        "/getServiciosExperiencias",
        "/getServiciosHospedajes"

    ];
}
