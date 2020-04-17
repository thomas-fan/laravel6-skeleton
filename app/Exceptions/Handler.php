<?php

namespace App\Exceptions;

use App\Enums\HttpStatusCode;
use App\Enums\ResponseMessage;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        // 自定义封装 http api 异常
        \App\Exceptions\HttpException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return mixed \Symfony\Component\HttpFoundation\Response or
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'message' => ResponseMessage::Message[$exception->getCode()] ?? '',
                'data' => $exception->errors(),
            ]);
        }

        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return response()->json([
                'success' => false,
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'message' => ResponseMessage::Message[$exception->getCode()] ?? '',
            ]);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'error' => $exception->getMessage(),
                'code' => HttpStatusCode::UNAUTHORIZED,
                'message' => ResponseMessage::Message[$exception->getCode()] ?? '',
            ], HttpStatusCode::UNAUTHORIZED);
        }

        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'error' => $exception->getMessage(),
                'code' => HttpStatusCode::NOT_FOUND,
                'message' => ResponseMessage::Message[$exception->getCode()] ?? '',
            ], HttpStatusCode::NOT_FOUND);
        }


        return parent::render($request, $exception);
    }
}
