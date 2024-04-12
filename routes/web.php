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

use App\Http\Controllers\AdminController;
use Symfony\Component\Routing\Loader\Configurator\ImportConfigurator;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/login', 'Auth\LoginController@index');

Route::middleware(['admin'])->group(function () {
    // Route::get('/tasks/create', 'AdminController@create')->name('tasks.create');
    Route::post('task-list','AdminController@store');
    Route::get('task-list','AdminController@show')->name('sam');
    // Route::get('task-list1','AdminController@show1')->name('sam');
    Route::post('task/{task_id}','AdminController@assignTask');
    Route::get('task/{task_id}','AdminController@listUsers')->name('sel');
    Route::patch('task/{task_id}','AdminController@updateTask');
    Route::get('selva','AdminController@taskList');
    Route::post('importTask', "TaskImport@importTask");
});
Route::post('deleteAssign','AdminController@deleteTask');
Route::post('selva','AdminController@selva');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
