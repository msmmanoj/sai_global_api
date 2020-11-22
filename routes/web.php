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

/*
 * Routes Related to cashbook
 */


Route::get('/getCashbook','CashbookController@getCashbookValues');
Route::post('/insertCashbook','CashbookController@insertCashbookValues');
Route::put('/updateCashbook/{id}','CashbookController@updateCashbookById');
Route::delete('/deleteCashbook/{id}','CashbookController@deleteCashbookById');

/*
 * Routes Related to Company Names
 */

Route::get('getCompanyLists','CompanyNameController@getCompanyLists');
Route::post('/insertCompany','CompanyNameController@insertCompany');
Route::put('/updateCompany/{id}','CompanyNameController@updateCompany');
Route::delete('/deleteCompany/{id}','CompanyNameController@deleteCompany');
