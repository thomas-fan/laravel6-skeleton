<?php

namespace App\Exceptions;


use App\Enums\HttpStatusCode;
use Throwable;

class UnauthorizedException extends HttpException
{
    protected $statusCode = HttpStatusCode::UNAUTHORIZED;

    public function __construct($message = "未认证", $code = HttpStatusCode::UNAUTHORIZED, $data = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $data, $previous);
    }
}
