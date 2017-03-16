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



// Backoffice Routes
Route::group(['prefix' => 'backoffice'], function () {

    Route::get('/', 'Backoffice\AdminController@redirect');
    Route::get('/dashboard','Backoffice\AdminController@dashboard'); 

    //Backoffice auth backend 
    Route::get('/login','Backoffice\Auth\LoginController@showLoginForm'); 
    Route::post('/login','Backoffice\Auth\LoginController@login'); 
    Route::get('/logout','Backoffice\Auth\LoginController@logout'); 

  
    // //Backoffice reset password
    // Route::group(['prefix'=>'password'],function(){

    //     // Password reset link request routes...
    //     Route::get('/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
    //     Route::post('/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');

    //     // Password reset routes...
    //     Route::get('/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
    //     Route::post('/reset', 'Admin\Auth\ResetPasswordController@reset');
    // });

    // //resource user with AJAX   
    // \CRUD::resource('/user','Admin\User\UserCrudController'); 

    //resource member with AJAX   
     \CRUD::resource('/member','Backoffice\User\MemberCrudController'); 
    //resource AMC with AJAX   
     \CRUD::resource('/amc','Backoffice\User\AMCCrudController'); 
}); 
