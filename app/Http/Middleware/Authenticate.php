<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return null;
    }

    protected function unauthenticated($request, array $guards)
    {
        $url = $request->fullUrl();
        $appURL = env('APP_URL');
        if($url === $appURL . '/api/articles') {
            return $appURL . '/api/articles';
        }
        return $request->fullUrl();
    }
}
