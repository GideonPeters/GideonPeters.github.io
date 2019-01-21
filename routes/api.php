<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', 'UsersController@index');
Route::get('/users/{user_id}', 'UsersController@show');
Route::post('/users', 'UsersController@store');
Route::put('/users/{user_id}', 'UsersController@update');
Route::delete('/users/{user_id}', 'UsersController@destroy');

Route::get('/users/{user_id}/projects', 'ProjectsController@index');
Route::get('/users/{user_id}/projects/{project_id}', 'ProjectsController@show');
Route::post('/users/{user_id}/projects', 'ProjectsController@store');
Route::put('/users/{user_id}/projects/{project_id}', 'ProjectsController@update');
Route::delete('/users/{user_id}/projects/{project_id}', 'ProjectsController@destroy');

Route::get('/users/{user_id}/projects/{project_id}/tasks', 'TasksController@index');
Route::post('/users/{user_id}/projects/{project_id}/tasks', 'TasksController@store');
Route::post('/users/{user_id}/projects/{project_id}/tasks/{task_id}', 'TasksController@update');
// Route::put('/user/{task_id}', 'TasksController@update');
