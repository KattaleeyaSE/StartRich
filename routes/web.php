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

Route::Auth();

// Suitability Test Routes
Route::group(['prefix' => 'suitabilitytest'], function () {
    // AMC Suitability Test Routes
    Route::group(['prefix' => 'amc'], function () { 
        Route::get('/index','SuitabilityTest\SuitabilityTestAMCController@index');
        Route::get('/create','SuitabilityTest\SuitabilityTestAMCController@create'); 
        Route::get('/edit/{id}','SuitabilityTest\SuitabilityTestAMCController@edit'); 
        Route::get('/show/{id}','SuitabilityTest\SuitabilityTestAMCController@show'); 
        Route::delete('/delete/{id}','SuitabilityTest\SuitabilityTestAMCController@destroy'); 
    }); 

    // AMC Suitability Test Routes
    Route::group(['prefix' => 'member'], function () { 
        Route::get('/index','SuitabilityTest\SuitabilityTestMemberController@index'); 
        Route::get('/alltest','SuitabilityTest\SuitabilityTestMemberController@all_test');  
        Route::get('/recordtest','SuitabilityTest\SuitabilityTestMemberController@record_test'); 
        Route::get('/show/{id}','SuitabilityTest\SuitabilityTestMemberController@show_record'); 
        Route::get('/take/{id}','SuitabilityTest\SuitabilityTestMemberController@take_test'); 
        Route::post('/storetest','SuitabilityTest\SuitabilityTestMemberController@store_test');  
        Route::delete('/delete/{id}','SuitabilityTest\SuitabilityTestMemberController@destroy'); 
    }); 

}); 


// Suitability Test Routes
Route::group(['prefix' => 'estimateprofit'], function () {  
    Route::get('/index','EstimateProfit\EstimateProfitMemberController@index');   
    Route::get('/create','EstimateProfit\EstimateProfitMemberController@create');   
    Route::post('/store','EstimateProfit\EstimateProfitMemberController@store');   
});

// Member Routes
Route::group(['prefix' => 'member'], function () {
    
    Route::get('/profile','Member\MemberController@show'); 
    Route::get('/profile/edit','Member\MemberController@edit'); 
    Route::patch('/profile','Member\MemberController@update'); 
});

// AMC Routes
Route::group(['prefix' => 'amc'], function () {
    Route::get('/fund','AMC\AMCController@fund');
    Route::get('/create','AMC\AMCController@fundadd');

    Route::get('/getfund','AMC\AMCController@getfund');
    Route::post('/addnav','AMC\AMCController@addapi');
    Route::get('/profile','AMC\AMCController@show');
    Route::get('/profile/edit','AMC\AMCController@edit'); 
    Route::patch('/profile','AMC\AMCController@update'); 

    Route::get('/fund', 'AMC\FundController@index');
});

// Backoffice Routes
Route::group(['prefix' => 'admin'], function () {

    //Backoffice auth backend 
    Route::get('/login','Admin\Auth\LoginController@showLoginForm'); 
    Route::post('/login','Admin\Auth\LoginController@login'); 
    Route::get('/logout','Admin\Auth\LoginController@logout'); 

  
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
     \CRUD::resource('/member','Admin\User\MemberCrudController'); 

    //resource AMC with AJAX   
     \CRUD::resource('/amc','Admin\User\AMCCrudController');
}); 
