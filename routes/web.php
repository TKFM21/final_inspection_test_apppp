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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');

Route::get('gender/index', 'HomeController@gindex')->name('gender.index');
Route::get('gender/create', 'HomeController@create')->name('gender.create');
Route::post('gender/store', 'HomeController@store')->name('gender.store');

Route::get('departments', 'HomeController@dindex')->name('dindex');
Route::get('department/create', 'HomeController@dcreate')->name('department.create');
Route::post('department/store', 'HomeController@dstore')->name('department.store');

Route::get('roles', 'HomeController@rindex')->name('rindex');
Route::get('role/create', 'HomeController@rcreate')->name('role.create');
Route::post('role/store', 'HomeController@rstore')->name('role.store');

Route::get('users/index', 'HomeController@usersIndex')->name('users.index');

Route::resource('statuses', 'StatusesController');

Route::resource('fan_kbn1s', 'FanKbn1sController');

Route::resource('kensa_c1s', 'KensaC1sController');

Route::resource('kensa_c2s', 'KensaC2sController');

Route::resource('katabans', 'KatabansController');
Route::get('katabans/{id}/items', 'KatabansController@items')->name('katabans.items');
Route::put('katabans/application/{id}', 'KatabansController@application')->name('katabans.application');
Route::put('katabans/confirmed/{id}', 'KatabansController@confirmed')->name('katabans.confirmed');
Route::put('katabans/approval/{id}', 'KatabansController@approval')->name('katabans.approval');
Route::put('katabans/back/{id}', 'KatabansController@back')->name('katabans.back');

Route::resource('kataban_inspection_items', 'KatabanInspectionItemController');

Route::resource('final_inspection_records', 'FinalInspectionRecordsController');

Route::resource('final_inspection_details', 'FinalInspectionDetailsController');

Route::get('inspection/start', 'FinalInspectionRecordsController@start')->name('inspection.start');
Route::post('inspection/modelquery', 'FinalInspectionRecordsController@modelquery')->name('inspection.modelquery');
Route::post('inspection', 'FinalInspectionRecordsController@store')->name('final_inspection_records.store');

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {
    //
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

});

//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
