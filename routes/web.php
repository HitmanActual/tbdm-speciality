<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{
$router->get('specialities','SpecialityController@index');
$router->post('specialities','SpecialityController@store');
$router->get('specialities/{speciality}','SpecialityController@show');
$router->put('specialities/{speciality}','SpecialityController@update');
$router->patch('specialities/{speciality}','SpecialityController@update');
$router->delete('specialities/{speciality}','SpecialityController@destroy');
$router->delete('specialities/{speciality}','SpecialityController@destroy');
});