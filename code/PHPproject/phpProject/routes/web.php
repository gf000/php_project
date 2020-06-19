<?php

use Illuminate\Support\Facades\Route;

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

//测试用
Route::post('/ok', function () {
    return view('welcome');
});

//用户登陆页面
Route::any('/user/login','UserController@login');

Route::any('/user/logi','UserController@logi');

//用户注册页面
Route::get('/user/register','UserController@register');


//存储注册的新用户
Route::post('/user/store','UserController@store');

//用户登录处理
Route::post('/user/doLogin','UserController@doLogin');

Route::group(['middleware'=>'isLogin'],function(){
    //进入用户个人主页
    Route::get('/list/index',function(){
        return redirect('/list/myList');
    });
    //用户登出
    Route::get('/user/logout','UserController@logout');
    //资源路由 我的列表
    Route::resource('/list/myList','ListController');

    //资源路由 共享列表
    Route::resource('/list/sharedList','SharedListController');
    
    //Route::resource('/list/myList/create','ListController@create');

    //待办列表中的各事项
    Route::get('/list/task/{id}','TaskController@index');
    Route::get('/list/task/create/{id}','TaskController@create');
    Route::post('/list/task/store','TaskController@store');
    Route::get('/list/task/edit/{id}','TaskController@edit');
    Route::post('/list/task/update/{id}','TaskController@update');
    Route::post('/list/task/delete/{id}','TaskController@destroy');
    Route::post('/list/task/deleteAll','TaskController@destroyAll');
    Route::post('/list/task/complete/{id}','TaskController@complete');
    Route::post('/list/task/completeAll','TaskController@completeAll');

    Route::get('/sharedlist/task/{id}','TaskController@sharedindex');

    Route::get('/friend','FriendController@show');
    Route::post('/friend/delete/{myid}/{friend_id}','FriendController@delete');
    
    Route::get('/list/sharedList/share/{id}','SharedListController@share');
    //Route::post('/list/sharedList/store','SharedListController@store');
    Route::get('/message','SharedListController@message');
    Route::post('/message/agree/{id}','SharedListController@agree');
    Route::post('/message/reject/{id}','SharedListController@reject');
    
});





