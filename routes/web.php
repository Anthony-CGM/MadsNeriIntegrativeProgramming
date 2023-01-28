<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

//AUTH SANCTUM
Route::group (['middleware' => ['auth:sanctum','role:Employee,Administrator']], function () {
//SERVICE
Route::resource('service', 'ServiceController');
Route::view('/service', 'service.index');
//CUSTOMER
Route::resource('customers', 'CustomerController');
Route::view('/customers', 'customer.index');
//EMPLOYEE
Route::resource('employees', 'EmployeeController');
Route::view('/employees', 'employee.index');
//SUPPLIER
Route::resource('supplier', 'SupplierController');
Route::view('/supplier', 'supplier.index');
//SUPPLIES
Route::resource('supplies', 'SuppliesController');
Route::view('/supplies', 'supplies.index');
//DEVICE
Route::resource('device', 'DeviceController');
Route::view('/device', 'device.index');
Route::get('/device', ['uses' => 'DeviceController@index']);
//SHOP
Route::resource('shop', 'SuppliesController');
Route::view('/shop', 'shop.index');
});
//DASHBOARD
Route::get('/dashboard/customerChart',[
    'uses' => 'DashboardController@activeChart',
    'as' => 'dashboard.activeChart'
]);
Route::get('/dashboard/suppliesChart',[
    'uses' => 'DashboardController@suppliesChart',
    'as' => 'dashboard.suppliesChart'
]);
Route::view('/dashboard','dashboard.index');
//SIGNIN
Route::get('signin', [
    'uses' => 'LoginController@index',
    'as' => 'user.signin',
]);

//REGISTER
Route::view('/register', 'user.register');

//HOMEPAGE
Route::view('/home', 'welcome');

//PROFILE PAGE
Route::get('/profile', [LoginController::class, 'indexs']);



