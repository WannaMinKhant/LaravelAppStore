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

Route::get('/app_upload','AppUploadController@index');
// Route::get('/AdminController','AppUploadController@login');


Route::post('/app_upload/upload','AppUploadController@upload')->name('upload');

Route::get('/view_apps','AppUploadController@show');

Route::get('/download/{appName}','AppUploadController@download');

Route::get('admin/dashboard','AdminController@index');
Route::get('admin/login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login','Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


// Auth::routes();

Route::post('/admin/logout','Admin\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
