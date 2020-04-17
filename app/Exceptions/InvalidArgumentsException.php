<?php

namespace App\Exceptions;


use App\Enums\HttpStatusCode;
use Throwable;

class InvalidArgumentsException extends HttpException
{
    protected $statusCode = HttpStatusCode::INVALID_ARGUMENTS;

    public function __construct($message = "请求参数错误", $code = HttpStatusCode::INVALID_ARGUMENTS, $data = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $data, $previous);
    }
}
