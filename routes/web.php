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
Route::resource('projects','ProjectController');
Route::get('/products/create','ProductController@create');
Route::get('/products', 'ProductController@index');
Route::post('/products','ProductController@store');
//Route::resource('/projects/{project1}/tasks', 'ProjectTaskController');
// Route::get('/projects', 'ProjectController@index');

// Route::get('/projects/create', 'ProjectController@create');

// Route::get('/projects/{project}', 'ProjectController@show');


// Route::post('/projects', 'ProjectController@store');
Route::post('/projects/{project}/tasks','ProjectTaskController@store');

// Route::get('/projects/{project}/edit', 'ProjectController@edit');

Route::patch('/tasks/{task}','ProjectTaskController@update');

// Route::delete('/projects/{project}', 'ProjectController@destroy');