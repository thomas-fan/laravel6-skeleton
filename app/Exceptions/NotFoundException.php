<?php

namespace App\Exceptions;


use App\Enums\HttpStatusCode;
use Throwable;

class NotFoundException extends HttpException
{
    protected $statusCode = HttpStatusCode::NOT_FOUND;

    public function __construct($message = "资源未找到", $code = HttpStatusCode::NOT_FOUND, $data = [], Throwable $previous = null)
    {
        parent::__construct($message, $code, $data, $previous);
    }
}
