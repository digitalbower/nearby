<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public static function withLoader($url, $status = 302)
    {
        return redirect($url, $status)->with('show_loader', true);
    }

    public static function routeWithLoader($route, $parameters = [], $status = 302)
    {
        return redirect()->route($route, $parameters, $status)->with('show_loader', true);
    }

    public static function backWithLoader()
    {
        return redirect()->back()->with('show_loader', true);
    }

    public static function actionWithLoader($action, $parameters = [], $status = 302)
    {
        return redirect()->action($action, $parameters, $status)->with('show_loader', true);
    }
}
