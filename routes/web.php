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
Route::get('/admin/select_area', 'AdminController@select_area');
Route::get('/admin/select_medic', 'AdminController@select_medic');


#CITAS#
Route::get('/appointments', 'AppointmentsController@index');
Route::any('/appointments/create', 'AppointmentsController@create');
Route::post('/appointments', 'AppointmentsController@store');
Route::get('/appointments/select_area', 'AppointmentsController@select_area');
Route::get('/appointments/select_medico', 'AppointmentsController@select_medico');
Route::get('/appointments/select_fecha', 'AppointmentsController@select_fecha');
Route::any('/appointments/bloques_disponibles', 'AppointmentsController@bloques_disponibles');
Route::post('appointment/update{id}', 'appointmentsController@wait_list_to_appointment');


#MÉDICOS#
Route::get('/medics', 'AppointmentsController@medics_information');
Route::get('/medic_day', 'AppointmentsController@medics_day');
Route::any('/medics/record', 'AppointmentsController@show_record'); # muestra Files y Medications

#SECRETARIA
Route::get('/appointments/next_day', 'AppointmentsController@next_day');

#FILES#
Route::any('/medics/filescreate', 'FilesController@create');
Route::post('/medicfiles', 'FilesController@store');

#MEDICATIONS#
Route::any('/medics/medicationscreate', 'MedicationsController@create');
Route::post('/medicmedications', 'MedicationsController@store');

#SCHEDULES
Route::any('/schedules/create', 'SchedulesController@create');
Route::post('/schedules', 'SchedulesController@store');

#DEPARTMENTS
Route::any('/admin/create_department', 'DepartmentsController@create');
Route::post('/departments', 'DepartmentsController@store');

#CERTIFICATES
Route::any('/certificates/create', 'CertificatesController@create');
Route::post('/certificates', 'CertificatesController@store');
Route::get('/certificates/vender_bono', 'CertificatesController@vender_bono');
Route::get('/certificates/results_search', 'CertificatesController@results_search');

#WAITING_LISTS
Route::any('/waiting_list/create', 'Waiting_listsController@create');
Route::post('/waiting_list', 'Waiting_listsController@store');
Route::any('/waiting_list_show', 'Waiting_listsController@index');
