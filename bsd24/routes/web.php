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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', "bsd24_mainController@bsd24_home_page");
Route::get("/login", "bsd24_mainController@login");
Route::post("/login", "bsd24_mainController@login_request");
Route::get('/sign_up', "bsd24_mainController@sign_up");
Route::post('/sign_up/request', "bsd24_mainController@sign_up_request");
Route::get('/contact_us', "bsd24_mainController@contact_us");
Route::get('/reviews', "bsd24_mainController@reviews");
route::get('/bsd24_admin/private/login','bsd24_mainController@login');



route::get('/admin/login', 'adminController@admin_login');
route::post('/admin/login', 'adminController@admin_login_request');

route::get('/admin_home_page', 'adminController@admin_home_page')->middleware('admin_permission');
