<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckCuratorUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_type = Auth::user()->user_type;
        if($user_type=='Curator'){
            if(Auth::user()->status=='UnApproved'){
                return redirect('/noPermission');
            }
        }
        return $next($request);
    }
}
