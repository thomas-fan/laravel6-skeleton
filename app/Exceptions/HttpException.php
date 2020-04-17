<?php

namespace App\Exceptions;

use App\Enums\HttpStatusCode;
use App\Enums\ResponseMessage;
use Exception;
use Throwable;

class HttpException extends Exception
{
    private $data = [];
    protected $statusCode = HttpStatusCode::BAD_REQUEST;
    public function __construct($message = "", $code = HttpStatusCode::BAD_REQUEST, $data = [], Throwable $previous = null)
    {
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }

    public function getData()
    {
        return $this->data;
    }

    public function render()
    {
        return response()->json([
            'success' => false,
            'error' => $this->getMessage(),
            'code' => $this->getCode(),
            'message' => ResponseMessage::Message[$this->getCode()] ?? '',
            'data' => $this->getData(),
        ], $this->statusCode);
    }
}
