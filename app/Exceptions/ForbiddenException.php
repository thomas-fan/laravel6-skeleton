<?php

namespace App\Exceptions;


use App\Enums\HttpStatusCode;
use Throwable;

class ForbiddenException extends HttpException
{
    protected $statusCode = HttpStatusCode::FORBIDDEN;

    public function __construct($message = "没有权限", $code = HttpStatusCode::FORBIDDEN, $data = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $data, $previous);
    }
}
