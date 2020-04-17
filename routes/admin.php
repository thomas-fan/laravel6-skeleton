<?php
/**
 * @author zf
 * @version 1.0.0
 * @Description admin 路由模块
 * @createTime 2020年04月07日 10:55:00
 */
use Illuminate\Support\Facades\Route;

// 通用前缀
Route::prefix('v1')->name('admin.api.v1.')->group(function () {
    // 登录类节流
    Route::post('auth/login', 'AuthController@login')->name('auth.login')->middleware('throttle:' . config('api.rate_limits.sign'));

    // 登陆后访问 api
    Route::group([
        'middleware' => 'auth:admin',
    ], function ($router) {
        // 访问类节流
        Route::middleware('throttle:' . config('api.rate_limits.access'))->prefix('auth')->group(function () {
            Route::delete('logout', 'AuthController@logout')->name('auth.logout');
            Route::put('refresh', 'AuthController@refresh')->name('auth.refresh');
            Route::get('me', 'AuthController@me')->name('auth.me');
        });
        Route::resource('permissions', 'PermissionController')->except(['create', 'edit']);
        Route::resource('roles', 'RoleController')->except(['create', 'edit']);
        // 查询角色含有的权限
        Route::get('roles/{role}/permissions', 'RoleController@permissions')->name('role.permissions');
        // 给角色赋予权限权限
        Route::put('roles/{role}/permissions', 'RoleController@assignPermissions')->name('role.assign-permissions');
        // 景区
        Route::resource('scenics', 'ScenicController')->except(['create', 'edit']);
        // 景点
        Route::resource('scenic_spots', 'ScenicSpotController')->except(['create', 'edit']);
        Route::resource('admins', 'AdminController')->except(['create', 'edit', 'delete']);
        // 超级管理员权限才可操作
        Route::middleware('role:' . config('auth.super_admin_slug'))->group(function () {

        });

    });
});

