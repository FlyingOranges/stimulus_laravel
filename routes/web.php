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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => ['auth', 'check.permission']],function ($router)
{
	$router->get('/','HomeController@index');

	// 权限
	// require(__DIR__ . '/admin/permission.php');
	$router->resource('permission','PermissionController');

	$router->resource('role','RoleController');

});
