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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'FrontendController@index');
Auth::routes();
Route::get('/home', 'DashboardController@index')->name('dashboard');

Route::group(['middleware'=>'auth'],function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    /*profile  start route */
    Route::get('/Profile', 'ProfileController@profile')->name('profile');
    Route::PUT('password-update','ProfileController@passwordUpdate')->name('password-update');
    Route::PUT('profile-update','ProfileController@profileUpdate')->name('profile-update');
    /*profile  end route */
//customer route//
    Route::get('/Customer/All','CustomerController@index')->name('customer.index');
    Route::post('/Customer/Store','CustomerController@store')->name('customer.insert');
    Route::get('/Customer/Create','CustomerController@create')->name('customer.create');
    Route::post('/Customer/Update/{id}','CustomerController@update')->name('customer.update');
////Messages Route//
    Route::get('Message/Index','MessageController@index')->name('message.index');
    Route::get('Message/Create','MessageController@create')->name('message.create');
    Route::get('Message/Sent','MessageController@sent')->name('message.sent');
    Route::get('Message/Chat/{id}','MessageController@chat')->name('message.chat');
    Route::post('Message/Send','MessageController@send')->name('message.send');
    Route::post('Message/Reply/{msg}','MessageController@reply')->name('message.reply');
//Employee route//
    Route::get('Employee/Index','EmployeeController@index')->name('employee.index');
    Route::get('Employee/Create','EmployeeController@create')->name('employee.create');
    Route::post('Employee/Store','EmployeeController@store')->name('employee.insert');
    Route::post('Employee/Update/{id}','EmployeeController@update')->name('employee.update');
    //    user route
    Route::get('/user/all','UserController@index')->name('user.index');
    Route::get('/user/Create','UserController@create')->name('user.create');
    Route::post('/user/Store','UserController@store')->name('user.insert');
    Route::get('/user/Status/{id}','UserController@status')->name('user.status');
});
