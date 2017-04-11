<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'suitability'], function () {
     Route::post('/create','API\SuitabilityTest\SuitabilityTestAPIController@store'); 
     Route::post('/update','API\SuitabilityTest\SuitabilityTestAPIController@update'); 
     Route::get('/edit/{id}','API\SuitabilityTest\SuitabilityTestAPIController@edit'); 
     Route::get('/allfunds','API\SuitabilityTest\SuitabilityTestAPIController@getFunds'); 
});

Route::group(['prefix' => 'estimateprofit'], function () {
     Route::get('/allfunds','API\EstimateProfit\EstimateProfitAPIController@allFunds');  
     Route::post('/create','API\EstimateProfit\EstimateProfitAPIController@store');  
     Route::post('/update','API\EstimateProfit\EstimateProfitAPIController@update');  
});
