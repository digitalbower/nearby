<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;


class Handler extends ExceptionHandler
{
         protected $levels = [
        //
    ];

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Handle 404 errors
        if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Not found'], 404);
            }
            
            return response()->view('errors.404', [], 404);
        }

        return parent::render($request, $exception);
    }
   

}
