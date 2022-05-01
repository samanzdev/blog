<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Run factory user
        User::factory()->count(10)->create();
        // Find user role = 1
        $user = User::where('is_superuser', 1)->first();
        // login user id 1
        Auth::loginUsingId(1);
        if ($user->is_superuser == 1) {
            return $next($request);
        }

        abort(404);
    }
}
