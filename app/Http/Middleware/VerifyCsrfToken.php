<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        $ar['isReading = '] = $this->isReading($request);
        $ar['runningUnitTests = '] = $this->runningUnitTests();
        $ar['shouldPassThrough = '] = $this->shouldPassThrough($request);
        $ar['tokensMatch = '] = $this->tokensMatch($request);

        //dd($ar);

        if (
            $this->isReading($request) ||
            $this->runningUnitTests() ||
            $this->shouldPassThrough($request) ||
            $this->tokensMatch($request)
        ) {
            return $this->addCookieToResponse($request, $next($request));
        }
        else{
            return redirect()->back();
        }

        throw new TokenMismatchException;
    }
}
