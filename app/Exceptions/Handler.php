<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
    
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }
    /**
     * Register the exception handling callbacks for the application.
     */
    // public function register(): void
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }
    public function render($request, Throwable $exception)
    {
        // Handle Model Not Found Exception (e.g., missing Product, Category, etc.)
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Resource not found',
                'error' => 'The requested resource does not exist.'
            ], 404);
        }

        // Handle Route Not Found Exception (Invalid URL)
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Route not found',
                'error' => 'Invalid URL.'
            ], 404);
        }

        // Default Laravel error handling
        return parent::render($request, $exception);
    }
}
