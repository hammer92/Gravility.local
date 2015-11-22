<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::post('matrix', array('as' => 'matrix', 'uses' => 'HomeController@matrix'));
Route::get('coding', array('as' => 'coding', 'uses' => 'CodingController@post_confirm'));

//Route::get('/', 'MenuController@index');

Route::get('/', function () {
    return view('gravility.matrix');
});

Route::get('/codigo', function () {
    return view('gravility.codigo');
});

Route::get('/preguntas', function () {
    return view('gravility.preguntas');
});
