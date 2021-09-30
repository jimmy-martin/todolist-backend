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

$router->get(
    '/',
    [
        'uses' => 'MainController@home',
        'as'   => 'main-home'
    ]
);


// -----------------------------------------
// CATEGORIES
// -----------------------------------------


$router->get(
    '/categories',
    [
        'uses' => 'CategoryController@list',
        'as'   => 'category-list'
    ]
);

$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'category-item'
    ]
);


// -----------------------------------------
// TASKS
// -----------------------------------------


$router->get(
    '/tasks',
    [
        'uses' => 'TaskController@list',
        'as'   => 'task-list'
    ]
);

$router->get(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@item',
        'as'   => 'task-item'
    ]
);

$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@create',
        'as'   => 'task-create'
    ]
);

$router->put(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'task-update'
    ]
);

$router->patch(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@update',
        'as'   => 'task-edit'
    ]
);

$router->delete(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@delete',
        'as'   => 'task-delete'
    ]
);
