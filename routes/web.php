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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return redirect('works');
});

Route::get('/home', function () {
    return redirect('works');
});

Auth::routes();

Route::get('/works', 'WorkController@index');
Route::get('/work/new', 'WorkController@create');
Route::post('/work', 'WorkController@store');
Route::get('/work/{work}', 'WorkController@show');
Route::get('/work/{work}/edit', 'WorkController@edit');
Route::post('/work/{work}', 'WorkController@update');
Route::delete('/work/{work}', 'WorkController@destroy');
Route::get('/works/notbilled', 'WorkController@showNotBilled');
Route::post('/work/{work}/billing', 'WorkController@billing');
Route::get('/works/drafts', 'WorkController@showDrafts');
Route::get('/works/search', 'WorkController@search');

Route::get('/workers', 'WorkerController@index');
Route::get('/worker/new', 'WorkerController@create');
Route::post('/worker', 'WorkerController@store');
Route::get('/worker/{worker}', 'WorkerController@show');
Route::get('/worker/{worker}/edit', 'WorkerController@edit');
Route::post('/worker/{worker}', 'WorkerController@update');
Route::delete('/worker/{worker}', 'WorkerController@destroy');

Route::get('/trucks', 'TruckController@index');
Route::get('/truck/new', 'TruckController@create');
Route::post('/truck', 'TruckController@store');
Route::get('/truck/{truck}', 'TruckController@show');
Route::get('/truck/{truck}/edit', 'TruckController@edit');
Route::post('/truck/{truck}', 'TruckController@update');
Route::delete('/truck/{truck}', 'TruckController@destroy');

Route::get('/subcontractors', 'SubcontractorController@index');
Route::get('/subcontractor/new', 'SubcontractorController@create');
Route::post('/subcontractor', 'SubcontractorController@store');
Route::get('/subcontractor/{subcontractor}', 'SubcontractorController@show');
Route::get('/subcontractor/{subcontractor}/edit', 'SubcontractorController@edit');
Route::post('/subcontractor/{subcontractor}', 'SubcontractorController@update');
Route::delete('/subcontractor/{subcontractor}', 'SubcontractorController@destroy');

Route::get('/companies', 'CompanyController@index');
Route::get('/company/new', 'CompanyController@create');
Route::post('/company', 'CompanyController@store');
Route::get('/company/{company}', 'CompanyController@show');
Route::get('/company/{company}/edit', 'CompanyController@edit');
Route::post('/company/{company}', 'CompanyController@update');
Route::delete('/company/{company}', 'CompanyController@destroy');

Route::get('/employees', 'EmployeeController@index');
Route::get('/employee/new', 'EmployeeController@create');
Route::post('/employee', 'EmployeeController@store');
Route::get('/employee/{employee}', 'EmployeeController@show');
Route::get('/employee/{employee}/edit', 'EmployeeController@edit');
Route::post('/employee/{employee}', 'EmployeeController@update');
Route::delete('/employee/{employee}', 'EmployeeController@destroy');

Route::get('/notes', 'NoteController@index');
Route::get('/allnotes', 'NoteController@index');
Route::get('/note/new', 'NoteController@create');
Route::post('/note', 'NoteController@store');
Route::get('/note/{note}/edit', 'NoteController@edit');
Route::post('/note/{note}', 'NoteController@update');
Route::delete('/note/{note}', 'NoteController@destroy');