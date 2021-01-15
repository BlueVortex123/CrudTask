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
return view('base');
});


Route::get('/employees','EmployeeController@index')->name('employee.index');
Route::post('/employees','EmployeeController@store')->name('employee.store');

Route::get('/employees/create','EmployeeController@create')->name('employee.create');
Route::get('/employee/{employees}','EmployeeController@show')->name('employee.show');

Route::get('/employees/{employees}/edit','EmployeeController@edit')->name('employee.edit');
Route::put('/employees/{employee}','EmployeeController@update')->name('employee.update');


