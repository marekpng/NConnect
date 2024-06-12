<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
//        'stages/*/send-signin-link',
//        'stages/*/send-signout-link',
//        '/about-us*',
//        '/gallery*',
//        '/admin*',
//        'api/custom-sites',
//        'api/custom-sites/*',
    ];
}
