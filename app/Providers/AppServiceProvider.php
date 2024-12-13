<?php

namespace App\Providers;
use App\Solicitud;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            // Obtener el conteo de solicitudes
            $solicitudesCount = Solicitud::where('estatus_solicitud', 'Enviada')->get();
            $solicitudes = $solicitudesCount->count();
            // Compartir la variable con todas las vistas
            $view->with('solicitudes', $solicitudes);
        });
    }
}
