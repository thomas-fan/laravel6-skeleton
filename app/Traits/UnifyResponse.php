<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description 统一响应格式
 * @createTime 2020年04月08日 10:39:00
 */

namespace App\Traits;


use App\Http\Resources\SimpleResponse;

trait UnifyResponse
{

    public function unifyResponse($data = [], $error = '', $code = 200)
    {
        return new SimpleResponse($data, $error, $code);
    }

    public function success($data = [], $code = 200)
    {
        $response = new SimpleResponse();
        $response->success($data, $code);
        return $response;
    }

    public function fail($error = '', $code = 400)
    {
        $response = new SimpleResponse();
        $response->fail($error, $code);
        return $response;
    }
}
