<?php

namespace App\Http\Middleware;

use App\Classes\Enums\UserTypesEnum;
use Closure;
use Illuminate\Http\Request;

class buyer
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
        if (auth()->user()->user_type == UserTypesEnum::User) {
            return $next($request);
        }
        return redirect('login')->with('error', 'You have not buyer access');    }
}
