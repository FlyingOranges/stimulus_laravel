<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::group(['prefix' => 'api'], function ($router) {

    //首页数据
    $router->group(['prefix' => 'index'], function ($router) {
        //首页数据
        $router->get('/', 'IndexController@indexPage');
    });

    //图文列表
    $router->group(['prefix' => 'article'], function ($router) {
        $router->get('/lists', 'ArticlesController@lists');

        $router->get('/info/{id}', 'ArticlesController@articles');
    });

});

