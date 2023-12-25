<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;
use Hamcrest\BaseMatcher;
use JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $response['status'] = 0;
                $response['message'] = 'Token is invalid!';
                $code = 401;
                return response()->json($response, $code);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                $response['status'] = 0;
                $response['message'] = 'Token hasn been expired!';
                $code = 401;
                return response()->json($response, $code);
            } else {
                $response['status'] = 0;
                $response['message'] = 'Authorization not found!';
                $code = 401;
                return response()->json($response, $code);
            }
        }
        return $next($request);
    }
}
