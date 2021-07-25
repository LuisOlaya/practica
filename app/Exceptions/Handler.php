<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e) {
        return $this->handleException($request, $e);
    }

    public function handleException($request, Throwable $exception) {
        if ($exception instanceof ValidationException) {
            $error = $exception->validator->errors()->getMessages();
            return $this->error($error, 422);
        }

        if ($exception instanceof ModelNotFoundException) {
            $modelo = class_basename($exception->getModel());
            return $this->error("No existe ninguna instancia para $modelo con el id entregado", 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            
            return $this->error("No se encontro la URL especificada", 404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            
            return $this->error("El metodo especificado en la petición no es valido", 405);
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return $this->error('Falla inesperada', 500);
    }


}
