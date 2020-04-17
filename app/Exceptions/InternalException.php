<?php

namespace App\Exceptions;

use App\Enums\HttpStatusCode;
use Exception;
use Throwable;

class InternalException extends HttpException
{
    protected $statusCode = HttpStatusCode::INTERNAL;

    public function __construct($message = "内部错误", $code = HttpStatusCode::INTERNAL, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
