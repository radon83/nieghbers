<?php

namespace App\Http\Middleware;

use App\Http\Controllers\cpanel\auth\AuthenticationController;
use App\Models\Block;
use Closure;
use Illuminate\Http\Request;

class PreventBlockedUserMiddleware
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
        $position = 'admin';
        // if (auth('user')->check()) {
        //     $position = 'user';
        // }

        $blockListCount = Block::where([
            ['position', '=', $position],
            ['active', '=', true],
        ])->count();


        if ($blockListCount) {
            logoutUser();
            session()->flash('message', __('Something went wrong, please contact customer service and try again later!'));
            return redirect()->route('login', $position);
        }

        if (auth()->user()->status == 'active')
            return $next($request);
        else
            return redirect()->route('login', $position);
    }
}
