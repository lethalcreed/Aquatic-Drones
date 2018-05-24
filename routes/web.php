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
//Authentication Routes
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');


//Admin Routes
Route::middleware(['role:admin'])->group(function () {
    //Drone Routes
    Route::get('/drones', 'DronesController@getList')->name('drones.list');
    Route::get('/drones/edit/{id}', 'DronesController@edit')->name('drones.edit');
    Route::post('/drones/edit', 'DronesController@update')->name('drones.update');
    Route::get('/drones/add', 'DronesController@add')->name('drones.add');
    Route::post('/drones/add', 'DronesController@store')->name('drones.store');
    Route::get('/drones/delete/{id}', 'DronesController@delete')->name('drones.delete');

    //Drone Setting Routes
    Route::get('/drones/settings', 'DronesSettingsController@edit')->name('settings.standard.edit');
    Route::post('/drones/settings', 'DronesSettingsController@update')->name('settings.standard.update');

    //User Routes
    Route::get('/users', 'UserController@getList')->name('users.list');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('/users/edit', 'UserController@update')->name('users.update');
    Route::get('/users/add', 'UserController@add')->name('users.add');
    Route::post('/users/add', 'UserController@store')->name('users.store');
    Route::get('/users/delete/{id}', 'UserController@delete')->name('users.delete');

    //Drone Task Routes
    Route::get('/tasks', 'DronesTasksController@getList')->name('tasks.list');
    Route::get('/tasks/edit/{id}', 'DronesTasksController@edit')->name('tasks.edit');
    Route::post('/tasks/edit', 'DronesTasksController@update')->name('tasks.update');
    Route::get('/tasks/add', 'DronesTasksController@add')->name('tasks.add');
    Route::post('/tasks/add', 'DronesTasksController@store')->name('tasks.store');
    Route::get('/tasks/delete/{id}', 'DronesTasksController@delete')->name('tasks.delete');
});