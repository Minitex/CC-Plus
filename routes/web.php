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
// Route::get('/', function () {
//     return view('reports.create');
// })->middleware('auth');
//
Route::get('/', 'SavedReportController@home')->name('home')->middleware(['auth']);
Route::get('/home', 'SavedReportController@home')->name('home')->middleware(['auth']);

Route::resource('/consortia','ConsortiumController')->middleware('can:update,consortium');
Route::resource('/roles', 'RoleController');
Route::resource('/users', 'UserController');
Route::resource('/institutions', 'InstitutionController');
Route::resource('/institutiontypes', 'InstitutionTypeController');
Route::resource('/institutiongroups', 'InstitutionGroupController');
Route::resource('/providers', 'ProviderController');
Route::resource('/harvestlogs', 'HarvestLogController');
Route::resource('/failedharvests', 'FailedHarvestController');
Route::resource('/sushisettings', 'SushiSettingController')->middleware(['auth','role:Admin,Manager']);
Route::resource('/alertsettings', 'AlertSettingController')->middleware(['auth','role:Admin,Manager']);
Route::resource('/savedreports', 'SavedReportController')->middleware(['auth']);
Route::resource('/systemalerts', 'SystemAlertController')->middleware(['auth']);

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
// Route::get('/globaladmin', 'GlobalAdminController@index')->middleware('auth','role:GlobalAdmin');
// Route::get('/', 'ReportController@index')->name('reports')->middleware('auth');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware(['auth','role:Admin,Manager']);
Route::get('/alerts', 'AlertController@index')->name('alerts')->middleware('auth');
Route::get('/reports', 'ReportController@index')->name('reports.index')->middleware('auth');
Route::get('/reports/create', 'ReportController@create')->name('reports.create')->middleware('auth');
Route::get('/reports/preview', 'ReportController@preview')->name('reports.preview')->middleware('auth');
Route::get('/reports/{id}', 'ReportController@show')->name('reports.show')->middleware('auth');
Route::get('/reports-available', 'ReportController@getAvailable')->middleware(['auth']);
Route::get('/usage-report-data', 'ReportController@getReportData')->middleware(['auth']);
Route::post('/export-report-data', 'ReportController@exportReportData')->middleware(['auth']);
Route::post('/update-report-settings', 'ReportController@updateSettings')->middleware(['auth']);
Route::post('/save-report-config', 'SavedReportController@saveReportConfig')->middleware(['auth']);
//
Route::post('/update-alert-status', 'AlertController@updateStatus')->middleware(['auth','role:Admin,Manager']);
Route::post('/update-system-alert', 'AlertController@updateSysAlert')->middleware(['auth','role:Admin,Manager']);
Route::post('/alert-dash-refresh', 'AlertController@dashRefresh')->middleware('auth');
Route::post('/alertsettings-fields-refresh', 'AlertSettingController@fieldsRefresh')
     ->middleware(['auth','role:Admin,Manager']);
Route::post('/sushisettings-update', 'SushiSettingController@update')->middleware(['auth','role:Admin,Manager']);
Route::get('/sushisettings-refresh', 'SushiSettingController@refresh')->middleware(['auth']);
Route::get('/sushisettings-test', 'SushiSettingController@test')->middleware(['auth','role:Admin,Manager']);
Route::get('/harvestlogs/{id}/raw', 'HarvestLogController@downloadRaw')->middleware(['auth','role:Admin,Manager']);
