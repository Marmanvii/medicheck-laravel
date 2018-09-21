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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#ADMIN#
Route::get('/admin', 'AdminController@index');
Route::get('/admin/addmedic', 'AdminController@create');
Route::post('/admin', 'AdminController@store');

#CITAS#
Route::get('/appointments', 'AppointmentsController@index');
Route::any('/appointments/create', 'AppointmentsController@create');
Route::post('/appointments', 'AppointmentsController@store');
Route::get('/appointments/select_area', 'AppointmentsController@select_area');
Route::get('/appointments/select_fecha_medico', 'AppointmentsController@select_fecha_medico'); #Seleccionar fecha y médico.
Route::get('/appointments/bloques_disponibles', 'AppointmentsController@bloques_disponibles');

#MÉDICOS#
Route::get('/medics', 'AppointmentsController@medics_information');
Route::get('/medic_day', 'AppointmentsController@medics_day');
Route::any('/medics/record', 'AppointmentsController@show_record'); # muestra Files y Medications

#FILES#
Route::any('/medics/filescreate', 'FilesController@create');
Route::post('/medicfiles', 'FilesController@store');

#MEDICATIONS#
Route::any('/medics/medicationscreate', 'MedicationsController@create');
Route::post('/medicmedications', 'MedicationsController@store');
