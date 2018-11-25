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

#ADMIN-USER#
Route::get('/users/select_type', 'UsersController@select_type');
Route::get('/users/create', 'UsersController@create');
Route::post('/users', 'UsersController@store');

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

#PDF
Route::get('/report/users/view', 'ReportController@ViewUsersReport');
Route::get('/report/users/download', 'ReportController@DownloadUsersReport');

Route::get('/report/medics/select_area', 'ReportController@select_area');
Route::get('/report/medics/select_medic', 'ReportController@select_medic');
Route::get('/report/medics/select_fecha_inicial', 'ReportController@select_fecha_inicial');
Route::get('/report/medics/select_fecha_final', 'ReportController@select_fecha_final');
Route::get('/report/medics/ingresos', 'ReportController@view_ingresos');
Route::any('/report/medics/download', 'ReportController@download_medics_report');

Route::get('/report/hospital/select_fecha_inicio', 'ReportController@select_fecha_inicio_hospital');
Route::get('/report/hospital/select_fecha_final', 'ReportController@select_fecha_final_hospital');
Route::get('/report/hospital/ingresos', 'ReportController@view_ingresos_hospital');
Route::any('/report/hospital/download', 'ReportController@download_hospital_report');

Route::get('/history/show', 'ReportController@view_history');
Route::any('/report/history/download', 'ReportController@download_history_report');

Route::get('/report/hospital/view_historico', 'ReportController@view_historico');
Route::any('/report/hospital/download_historico', 'ReportController@download_historico_report');
