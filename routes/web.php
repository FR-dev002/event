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



$router->group(['namespace' => 'Auth'], function() use ($router)
{
    $router->post('auth/register', 'RegisterController@register');
    $router->post('auth/login', 'LoginController@login');
});


$router->group(['namespace' => 'Event'], function() use ($router)
{
    $router->get('event/getAll' ,'EventController@getAll');
});



