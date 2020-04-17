<?php
namespace App\Http\Resources;

use App\Enums\ResponseMessage;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class SimpleResponse
 * 简单请求响应
 * Response format:
 * {
 *   'success': true|false,
 *   'data': [],
 *   'error': '',
 *   'message': '',
 *   'code': 200,
 * }
 *
 */
class SimpleResponse implements \JsonSerializable
{
    /**
     * Data to be returned
     * @var mixed
     */
    private $data = [];

    /**
     * Error message in case process is not success. This will be a string.
     *
     * @var string
     */
    private $error = '';

    /**
     * @var bool
     */
    private $success = false;

    private $code = 200;

    private $message = '';

    /**
     * @param mixed $data
     * @param string $error
     * @param integer $code
     */
    public function __construct($data = [], string $error = '', $code = 200)
    {
        if ($this->shouldBeJson($data)) {
            $this->data = $data;
        }

        $this->error = $error;
        $this->success = !empty($data);
        $this->code = $code;
    }


    /**
     * Success with data
     *
     * @param array $data
     * @param integer $code
     */
    public function success($data = [], $code = 200)
    {
        $this->success = true;
        $this->code = $code;
        $this->data = $data;
        $this->error = '';
    }

    /**
     * Fail with error message
     * @param string $error
     * @param integer $code
     */
    public function fail($error = '', $code = 400)
    {
        $this->success = false;
        $this->error = $error;
        $this->data = [];
        $this->code = $code;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        $this->message = ResponseMessage::Message[$this->code] ?? '';
        return [
            'success' => $this->success,
            'error' => $this->error,
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }


    /**
     * Determine if the given content should be turned into JSON.
     *
     * @param  mixed  $content
     * @return bool
     */
    protected function shouldBeJson($content): bool
    {
        return $content instanceof Arrayable ||
            $content instanceof Jsonable ||
            $content instanceof \ArrayObject ||
            $content instanceof \JsonSerializable ||
            is_array($content);
    }
}
