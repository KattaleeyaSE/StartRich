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



// Admin Routes
Route::group(['prefix' => 'admin'], function () {
 
    //admin auth backend 
    Route::get('/login','Admin\Auth\LoginController@showLoginForm'); 
    Route::post('/login','Admin\Auth\LoginController@login'); 
    Route::get('/logout','Admin\Auth\LoginController@logout'); 

    //admin reset password
    Route::group(['prefix'=>'password'],function(){

        // Password reset link request routes...
        Route::get('/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');

        // Password reset routes...
        Route::get('/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
        Route::post('/reset', 'Admin\Auth\ResetPasswordController@reset');
    });

    //resource user with AJAX   
    \CRUD::resource('/user','Admin\User\UserCrudController'); 
}); 
