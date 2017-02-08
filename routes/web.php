<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['namespace' => 'Test', 'prefix' => 'test'], function($r){
    $r->get('/',['uses' => 'TestController@index', 'as' => 'test.index']);
    $r->get('/create',['uses' => 'TestController@testForm', 'as' => 'test.form']);
    $r->put('/create',['uses' => 'TestController@create', 'as' => 'test.create']);
    $r->get('/create/{test}',['uses' => 'TestController@fillTest', 'as' => 'test.fillTest']);
    $r->put('/create/{test}',['uses' => 'TestController@fillTest', 'as' => 'test.fillTest']);
});