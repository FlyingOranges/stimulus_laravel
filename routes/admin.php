<?php

Route::group([], function ($router) {

    /**
     * 登录模块 The login module
     */
    $router->group(['namespace' => 'Auth', 'middleware' => 'language'], function ($router) {
        $router->get('login', 'LoginController@showLoginForm')->name('login');
        $router->post('login', 'LoginController@login')->name('admin.login');
        $router->post('logout', 'LoginController@logout')->name('admin.logout');
    });

    /**
     * 核心模块 The core module
     */
    $router->group(['namespace' => 'Admin'], function ($router) {

        //后台富文本编辑器上传图片
        $router->post('/wangeditor/upload/image', 'HomeController@wangEditorUploadImage')
            ->name('wangEditor.upload.image');

        $router->group(['middleware' => ['auth', 'check.permission', 'language']], function ($router) {

            $router->post('/setting/admin', 'UserController@setting')->name('admin.setting.adminer');

            $router->get('/', 'HomeController@index');
            // 权限
            $router->resource('permission', 'PermissionController');
            // 角色
            $router->resource('role', 'RoleController');
            // 用户
            $router->resource('user', 'UserController');
            // 菜单
            $router->get('menu/clear', 'MenuController@cacheClear');
            $router->resource('menu', 'MenuController');
            $router->get('setting/{lang}', 'SettingController@language');

            // banner
            $router->resource('banners', 'BannersController');

            // articles
            $router->resource('articles', 'ArticlesController');
        });

    });
});
