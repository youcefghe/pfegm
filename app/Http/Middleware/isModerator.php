<?php

namespace App\Http\Middleware;

use App\Models\User_community;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && User_community::where('user_id',Auth::user()->id)->where('community_id',$request->route('id'))->where('role','<>','member')->exists()) {
            return $next($request);
        }

        return redirect('notModerator')->with('error','You have not admin access');
    }
}
