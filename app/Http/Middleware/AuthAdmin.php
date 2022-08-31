<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('utype')==='ADM') // verifica daca user-ul este ADMIN, daca nu il intoarce la pagina LOGIN!
        {
            return $next($request);
        }
        else
        {
            session()->flush();
            return redirect()->route('login');

        }
        return $next($request);
    }
}
