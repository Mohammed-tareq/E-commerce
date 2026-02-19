<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class ApiHandler
{
    use ApiResponse;

    public function __invoke(Throwable $e, Request $request)
    {
        if ($request->is('api/*') || $request->expectsJson()) {
            if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
                return $this->apiresponse('Resource not found', 404);
            }

            if ($e instanceof MethodNotAllowedHttpException) {
                return $this->apiresponse('Method not allowed', 405);
            }

            if ($e instanceof AuthenticationException) {
                return $this->apiresponse('Unauthenticated', 401);
            }

            if ($e instanceof AuthorizationException) {
                return $this->apiresponse('Forbidden', 403);
            }

            if ($e instanceof ThrottleRequestsException) {
                return $this->apiresponse('Too many requests', 429);
            }

            if ($e instanceof ValidationException) {
                return $this->apiresponse(
                    'Validation failed',
                    422,
                    $e->errors()
                );
            }

            return $this->apiresponse('Server error', 500);
        }

        return null;
    }


}