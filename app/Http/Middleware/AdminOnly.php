<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {

        $allowedEmails = [
            'moyaknox@gmail.com',
            'aislingknox@live.com',
        ];

        if (!Auth::check() || !in_array(Auth::user()->email, $allowedEmails)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
?>