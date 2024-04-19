<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!is_null(getUserGuard())) {
            $userSettings = getUserSettings();
            session()->flash('lang', $userSettings->lang);
            session()->flash('theme', $userSettings->theme);
        } else {
            session()->flash('lang', 'en');
            session()->flash('theme', 'dark');
        }

        app()->setLocale(session('lang'));

        return $next($request);
    }
}
