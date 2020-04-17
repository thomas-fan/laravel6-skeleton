<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description TODO
 * @createTime 2020年04月08日 15:38:00
 */

namespace App\Enums;


class HttpStatusCode
{
    const OK = 200;
    const CREATED = 201;
    const NO_CONTENT = 204;
    const BAD_REQUEST = 400;
    const INVALID_ARGUMENTS = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const INTERNAL = 500;
}
