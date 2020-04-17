<?php

use App\Http\Resources\SimpleResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @author zf
 * @version 1.0.0
 * @Description 辅助函数
 * @createTime 2020年04月08日 11:24:00
 */

/**
 * @param array $data
 * @param int $code
 * @return SimpleResponse
 */
function json_success($data = [], $code = 200) {
    $response = new SimpleResponse();
    $response->success($data, $code);
    return $response;
}

/**
 * @param string $error
 * @param int $code
 * @return SimpleResponse
 */
function json_fail($error = '', $code = 400) {
    $response = new SimpleResponse();
    $response->fail($error, $code);
    return $response;
}

function json_page(AnonymousResourceCollection $collection) {
    $data = $collection->resource->toArray();
    $response = new SimpleResponse();
    $response->success($data);
    return $response;
}

function json_created($data = []) {
    return json_success($data, 201);
}

function json_blank() {
    return json_success([], 204);
}
