<?php
 
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth; 
use Closure;
 
class AdminRoleAccess{

    public function handle($request, Closure $next){
        if(Auth::user()->role == 'admin') {
            return $next($request);
        }
        abort(403);
    }
}