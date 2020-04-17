<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description TODO
 * @createTime 2020年04月07日 17:50:00
 */

namespace App\Enums;


final class GuardTypes
{
    const API = 'api';
    const ADMIN = 'admin';
    const WEB = 'web';

    public static function types()
    {
        $class = new \ReflectionClass(__CLASS__);
        $constants = $class->getConstants();
        return array_values($constants);
    }
}
