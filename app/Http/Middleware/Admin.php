<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 5/31/2020
 * Time: 1:20 PM
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
       if(Auth::user() && Auth::user()->is_admin) {
           return $next($request);
       }
       return redirect('home');
   }
}