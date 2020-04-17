<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description TODO
 * @createTime 2020年04月08日 10:54:00
 */

namespace App\Enums;


final class ResponseMessage
{
    const Message = [
        HttpStatusCode::OK => '请求成功!',
        HttpStatusCode::CREATED => '创建资源成功!',
        HttpStatusCode::NO_CONTENT => '',
        HttpStatusCode::INVALID_ARGUMENTS => '请求参数错误!',
        HttpStatusCode::UNAUTHORIZED => '未登录!',
        HttpStatusCode::FORBIDDEN => '无操作权限!',
        HttpStatusCode::NOT_FOUND => '资源未找到!',
        HttpStatusCode::INTERNAL => '服务器内部错误',
    ];
}
