<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
    if ($exception instanceof \Illuminate\Database\QueryException && $exception->getCode() == 2002) {
        $path = request()->path(); // Get the current path
        $exception->path = $path; // Attach the path to the exception

        parent::report($exception);
    } else {
        parent::report($exception);
    }
}

    /**
     * Register the exception handling callbacks for the application.
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Database\QueryException &&
        $exception->getCode()) {
        $path = 'erros'; // Get the path from the exception

        $lastDate = null; // 


        return response()->view('pages.errors', ['path' => $path, 'lastDate' => $lastDate], 500);
    }

    
        return parent::render($request, $exception);
    }
    
}
