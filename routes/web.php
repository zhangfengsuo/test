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

Route::get("hello",function(){
    return "hello,welcome to laraver";
});
//路由传参（可选参数）
Route::get("user/{id?}",function($id=null){
    return "USER-".$id;
});
//路由传参（必选参数） 可以对参数做对应的限制where，支持正则表单时
Route::get("userto/{id}",function($id){
    return "USER-".$id;
})->where("id","[0-9]+");

//支持多种请求方式(match数组里面指定)
Route::match(['get','post'],'test',function(){
   return "test";
});
//和控制器关联起来
//Route::any("query","TestController@test");
Route::any("query",['uses'=>"TestController@test"]);

//指定路由别名(as指定)获取模板的详细路由
Route::any("user/info",["as"=>"info",function(){
    return route("info");
}]);

//注册调用方法的路由
Route::ANY("activity0",["uses"=>"TestController@activity0"]);
Route::group(["middleware"=>["activity"]],function(){
    Route::any("activity1",["uses"=>"TestController@activity1"]);
    Route::any("activity2",["uses"=>"TestController@activity2"]);
});

//注册测试request路由
//Route::post("get/{id?}",["uses"=>"TestController@getform"]);
Route::any("get",["uses"=>"TestController@getform"]);

//测试session
Route::any("session1",["uses"=>"TestController@session1"]);
Route::any("session2",["uses"=>"TestController@session2"]);


Route::get("test2",["uses"=>"TestController@test2"]);

//单控制器方法
Route::get("one/{id}","OneController");