<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@redirect');

Route::get('/sample', 'HomeController@sample')->name('sample');

// Route::get('/login-employee', 'EmployeeController@login');
// Route::get('/register-employee', 'EmployeeController@register')->name('employee-register');
// Route::post('/employee-login', 'EmployeeController@employeeLogin')->name('employee-login');
// Route::post('/employee-register', 'EmployeeController@employeeRegister')->name('employee-register');
// Route::get('/employee-home', 'EmployeeController@employeeHome');

Route::get('/job-post', 'EmployeeController@jobPost')->name('job-post');
Route::post('/uploadjob', 'EmployeeController@uploadJob')->name('uploadjob');
Route::get('/details/{id}', 'EmployeeController@details')->name('details');
Route::get('/edit/{id}', 'EmployeeController@edit')->name('edit');
Route::post('/editjob/{id}', 'EmployeeController@editJob')->name('editjob');
Route::get('/deletejob/{id}', 'EmployeeController@deleteJob')->name('deletejob');
Route::get('/viewapplicant', 'EmployeeController@viewapplicant')->name('viewapplicant');
Route::get('/download/{users}', 'EmployeeController@download')->name('download');


Route::post('/uploadresume', 'HomeController@uploadResume')->name('uploadresume');
Route::get('/resume/{id}', 'HomeController@resume')->name('resume');
Route::get('/jobdetails/{id}', 'HomeController@jobdetails')->name('jobdetails');
Route::post('/applyed/{id}', 'HomeController@applyed')->name('applyed');
Route::get('/viewapplyed/{id}', 'HomeController@viewapplyed')->name('viewapplyed');
Route::get('/cancel/{id}', 'HomeController@cancel')->name('cancel');
Route::get('/search', 'HomeController@search')->name('search');