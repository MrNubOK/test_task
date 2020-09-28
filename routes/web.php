<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$admin_page_parameters = [
    'middleware' => ['auth'],
    'prefix' => 'admin',
    'namespace' => 'Admin\\'
];

Route::group($admin_page_parameters, function() {
    Route::resource('/users', 'UserController')
        ->only(['index', 'edit', 'update']);
    Route::resource('/departments', 'DepartmentController')
        ->only(['index', 'edit', 'update']);
});
