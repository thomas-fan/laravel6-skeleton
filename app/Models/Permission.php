<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description 权限模型类
 * @createTime 2020年04月07日 13:17:00
 */
namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $fillable = [
        'name',
        'guard_name',
        'description',
    ];
}
