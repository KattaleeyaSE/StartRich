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
    Route::get('/result','EstimateProfit\EstimateProfitMemberController@result');   
    Route::get('/edit/{id}','EstimateProfit\EstimateProfitMemberController@edit');   
    Route::delete('/delete/{id}','EstimateProfit\EstimateProfitMemberController@destroy');   
});

// Member Routes
Route::group(['prefix' => 'member'], function () {
    
    Route::get('/profile','Member\MemberController@show'); 
    Route::get('/profile/edit','Member\MemberController@edit'); 
    Route::patch('/profile','Member\MemberController@update'); 

    Route::get('fund/favorite', 'Member\FundController@favorites')->name('member.fund.favorites');
    Route::patch('fund/{id}/favorite', 'Member\FundController@favorite')->name('member.fund.favorite');
    Route::get('fund', 'Member\FundController@index')->name('member.fund.index');
    Route::get('fund/{id}', 'Member\FundController@show')->name('member.fund.show');
});

// AMC Routes
Route::group(['prefix' => 'amc'], function () {
    Route::get('/fund','AMC\AMCController@fund');
    // Route::get('/create','AMC\AMCController@fundadd');

    Route::get('/getfund','AMC\AMCController@getfund');
    Route::post('/addnav','AMC\AMCController@addapi');
    Route::get('/profile','AMC\AMCController@show');
    Route::get('/profile/edit','AMC\AMCController@edit'); 
    Route::patch('/profile','AMC\AMCController@update'); 

    //Fund
        // NAV
        Route::get('fund/{id}/nav/create', 'AMC\FundController@createNAV')->name('amc.fund.create_nav');
        Route::post('fund/{id}/nav', 'AMC\FundController@storeNAV')->name('amc.fund.store_nav');
        Route::get('/nav/{id}/edit', 'AMC\FundController@editNAV')->name('amc.fund.edit_nav');
        Route::patch('/nav/{id}', 'AMC\FundController@updateNAV')->name('amc.fund.update_nav');
        Route::delete('/nav/{id}', 'AMC\FundController@destroyNAV')->name('amc.fund.destroy_nav');
        // Fund Manager
        Route::get('fund/{id}/manager/create', 'AMC\FundController@createManager')->name('amc.fund.create_manager');
        Route::post('fund/{id}/manager', 'AMC\FundController@storeManager')->name('amc.fund.store_manager');
        Route::get('/manager/{id}/edit', 'AMC\FundController@editManager')->name('amc.fund.edit_manager');
        Route::patch('/manager/{id}', 'AMC\FundController@updateManager')->name('amc.fund.update_manager');
        Route::delete('/manager/{id}', 'AMC\FundController@destroyManager')->name('amc.fund.destroy_manager');
        // Dividend Payment
        Route::get('fund/{id}/dividend/create', 'AMC\FundController@createDividend')->name('amc.fund.create_dividend');
        Route::post('fund/{id}/dividend', 'AMC\FundController@storeDividend')->name('amc.fund.store_dividend');
        Route::get('/dividend/{id}/edit', 'AMC\FundController@editDividend')->name('amc.fund.edit_dividend');
        Route::patch('/dividend/{id}', 'AMC\FundController@updateDividend')->name('amc.fund.update_dividend');
        Route::delete('/dividend/{id}', 'AMC\FundController@destroyDividend')->name('amc.fund.destroy_dividend');
        // Asset Allocation
        Route::get('fund/{id}/asset_allocation/edit', 'AMC\FundController@editAssetAllocation')->name('amc.fund.edit_asset_allocation');
        Route::patch('fund/{id}/asset_allocation', 'AMC\FundController@updateAssetAllocation')->name('amc.fund.update_asset_allocation');
        // Holding Company
        Route::get('fund/{id}/holding_company/create', 'AMC\FundController@createHoldingCompany')->name('amc.fund.create_holding_company');
        Route::post('fund/{id}/holding_company', 'AMC\FundController@storeHoldingCompany')->name('amc.fund.store_holding_company');
        Route::get('/holding_company/{id}/edit', 'AMC\FundController@editHoldingCompany')->name('amc.fund.edit_holding_company');
        Route::patch('/holding_company/{id}', 'AMC\FundController@updateHoldingCompany')->name('amc.fund.update_holding_company');
        Route::delete('/holding_company/{id}', 'AMC\FundController@destroyHoldingCompany')->name('amc.fund.destroy_holding_company');
        // Fee
        Route::get('fund/{id}/fee/create', 'AMC\FundController@createFee')->name('amc.fund.create_fee');
        Route::post('fund/{id}/fee', 'AMC\FundController@storeFee')->name('amc.fund.store_fee');
        Route::get('/fee/{id}/edit', 'AMC\FundController@editFee')->name('amc.fund.edit_fee');
        Route::patch('/fee/{id}', 'AMC\FundController@updateFee')->name('amc.fund.update_fee');
        // Fee
        Route::get('fund/{id}/expense/create', 'AMC\FundController@createExpense')->name('amc.fund.create_expense');
        Route::post('fund/{id}/expense', 'AMC\FundController@storeExpense')->name('amc.fund.store_expense');
        Route::get('/expense/{id}/edit', 'AMC\FundController@editExpense')->name('amc.fund.edit_expense');
        Route::patch('/expense/{id}', 'AMC\FundController@updateExpense')->name('amc.fund.update_expense');
        // Purchase Detail
        Route::get('fund/{id}/purchase_detail/create', 'AMC\FundController@createPurchaseDetail')->name('amc.fund.create_purchase_detail');
        Route::post('fund/{id}/purchase_detail', 'AMC\FundController@storePurchaseDetail')->name('amc.fund.store_purchase_detail');
        Route::get('/purchase_detail/{id}/edit', 'AMC\FundController@editPurchaseDetail')->name('amc.fund.edit_purchase_detail');
        Route::patch('/purchase_detail/{id}', 'AMC\FundController@updatePurchaseDetail')->name('amc.fund.update_purchase_detail');
        // Past Performance
        Route::get('fund/{id}/past_performance/create', 'AMC\FundController@createPastPerformance')->name('amc.fund.create_past_performance');
        Route::post('fund/{id}/past_performance', 'AMC\FundController@storePastPerformance')->name('amc.fund.store_past_performance');
        Route::get('/past_performance/{id}/edit', 'AMC\FundController@editPastPerformance')->name('amc.fund.edit_past_performance');
        Route::patch('/past_performance/{id}', 'AMC\FundController@updatePastPerformance')->name('amc.fund.update_past_performance');
        Route::delete('/past_performance/{id}', 'AMC\FundController@destroyPastPerformance')->name('amc.fund.destroy_past_performance');


    Route::resource('fund', 'AMC\FundController', [
                            'names' => [
                                'index' => 'amc.fund.index',
                                'show' => 'amc.fund.show',
                                'create' => 'amc.fund.create',
                                'store' => 'amc.fund.store',
                            ]]);
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
