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

// Route::get('/users', 'UsersController@index');
// Route::get('/users/{user_id}', 'UsersController@show');
// Route::post('/users', 'UsersController@store');
// Route::put('/users/{user_id}', 'UsersController@update');
// Route::delete('/users/{user_id}', 'UsersController@destroy');


// Route::get('/users/projects', 'ProjectsController@index');
// Route::get('/users/{user_id}/projects', 'ProjectsController@show');
// Route::post('/users/{user_id}/projects', 'ProjectsController@store');
// Route::put('/users/{user_id}/projects/{project_id}', 'ProjectsController@update');
// Route::delete('/users/{user_id}/projects/{project_id}', 'ProjectsController@destroy');



