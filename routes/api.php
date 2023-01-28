<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;

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

//PUBLIC ROUTES
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

//PROTECTED ROUTES
Route::group (['middleware' => ['auth:sanctum']], function () {
Route::post('/logout',[AuthController::class, 'logout']);
Route::delete('/supplier/{id}',['uses' => 'SupplierController@destroy']);
//CUSTOMER
Route::get('/customer/all',['uses' => 'CustomerController@getCustomerAll']);
Route::resource('customer', 'CustomerController');
Route::post('/customer/{id}',['uses' => 'CustomerController@update']);
//DEVICE
Route::get('/device/all',['uses' => 'DeviceController@getAllDevice']);
Route::resource('device', 'DeviceController');
Route::post('/device/{id}',['uses' => 'DeviceController@update']);
//EMPLOYEE
Route::get('/employee/all',['uses' => 'EmployeeController@getEmployeeAll']);
Route::resource('employee', 'EmployeeController');
Route::post('/employee/{id}',['uses' => 'EmployeeController@update']);
//SUPPLIER
Route::get('/supplier/all',['uses' => 'SupplierController@getSupplierAll']);
Route::resource('supplier', 'SupplierController');
Route::post('/supplier/{id}',['uses' => 'SupplierController@update']);
//SUPPLIES
Route::get('/supplies/all',['uses' => 'SuppliesController@getSuppliesAll']);
Route::resource('supplies', 'SuppliesController');
Route::post('/supplies/{id}',['uses' => 'SuppliesController@update']);
//SERVICE
Route::get('/service/all',['uses' => 'ServiceController@getAllService']);
Route::resource('service', 'ServiceController');
Route::post('/service/{id}',['uses' => 'ServiceController@update']);
//SHOP
Route::resource('shop', 'SuppliesController');
Route::view('/shop-index', 'shop.index');
Route::post('/supply/checkout',['uses' => 'SuppliesController@postCheckout','as' => 'checkout']);
});

//DASHBOARD
Route::get('/dashboard/title-chart',[
    'uses' => 'DashboardController@titleChart',
    'as' => 'dashboard.titleChart'
]);
Route::get('/dashboard/suppliesChart',[
  'uses' => 'DashboardController@suppliesChart',
  'as' => 'dashboard.suppliesChart'
]);
//SIGNIN
Route::post('signin', [
    'uses' => 'LoginController@postSignin',
    'as' => 'user.signin',
]);
//LOGOUT
Route::get('logout',[
  'uses' => 'LoginController@logout',
  'as' => 'logout',
]);

Route::group(['middleware' => 'guest'], function() {
    Route::resource('customer', 'CustomerController')->only(['store']);
});
