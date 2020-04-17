<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description 角色模型类
 * @createTime 2020年04月07日 13:18:00
 */

namespace App\Models;


class Role extends \Spatie\Permission\Models\Role
{
    protected $fillable = [
        'name',
        'description',
        'guard_name',
    ];
}
