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
Route::get('/exchange_operation_view', "bsd24_mainController@exchange_operation_view");
Route::post('/exchange_operation_view', "bsd24_mainController@exchange_operation_view_post");
Route::get('/contact_us', "bsd24_mainController@contact_us");
Route::post('/contact_us', "bsd24_mainController@contact_request");
Route::get('/reviews', "bsd24_mainController@reviews");
Route::post('/review', "bsd24_mainController@reviews_submit");
Route::get('/user_profile', "bsd24_mainController@profile")->middleware('user_persmission');
route::get('/bsd24_admin/private/login','bsd24_mainController@login');
route::get('/login_check_user', 'bsd24_mainController@login_check_user');
route::get('/bsd24_exchange_final_stage','bsd24_mainController@bsd24_exchange_final_stage');
route::post('/bsd24_exchange_final_stage','bsd24_mainController@bsd24_exchange_final_last');
route::get('/thank_you','bsd24_mainController@thank_you');
route::get('/only_test','bsd24_mainController@only_test');
Route::get('/user_info/{email}', "bsd24_mainController@other_user_profile");
Route::get('/exchange_tracking/{bsd24_exchange_id}','bsd24_mainController@bsd24_exchange_tracking');
Route::get('/all_transaction_info/{tracking_id}','bsd24_mainController@track_a_transaction');
Route::get('/logout', 'bsd24_mainController@logout_user');
Route::get('/track_transaction', 'bsd24_mainController@track_transaction');
Route::get('read_processing/present_precessing','bsd24_mainController@read_processing');
Route::get('read_completed/present_completed','bsd24_mainController@read_completed');











route::get('/admin/login', 'adminController@admin_login');
route::post('/admin/login', 'adminController@admin_login_request');

route::get('/admin_home_page', 'adminController@admin_home_page')->middleware('admin_permission');
route::get('/our_reserve', 'adminController@our_reserve')->middleware('admin_permission');
route::get('/add_a_new_reserve', 'adminController@add_a_new_reserve')->middleware('admin_permission');
route::post('/add_a_new_reserve', 'adminController@add_a_new_reserve_stor')->middleware('admin_permission');
route::post('/add_a_new_reserve/{id}', 'adminController@add_a_new_reserve_stor_update')->middleware('admin_permission');
route::get('/reserve_update/{id}', 'adminController@reserve_update')->middleware('admin_permission');
route::get('/delete_reserve/{id}', 'adminController@delete_a_reserve')->middleware('admin_permission');


route::get('/exchange_operation', 'adminController@exchange_operation')->middleware('admin_permission');
route::get('/exchange_command/process/{bsd24_transaction_id}', 'adminController@execute_process');
route::get('/exchange_command/complete/{bsd24_transaction_id}', 'adminController@execute_completed');
route::get('/exchange_command/delete/{bsd24_transaction_id}', 'adminController@execute_delete');


route::get('/send_receive_info', 'adminController@send_receive_info')->middleware('admin_permission');
route::post('/send_receive_info', 'adminController@send_receive_info_post')->middleware('admin_permission');
route::post('send_receive_info/{id}', 'adminController@send_receive_info_post_update')->middleware('admin_permission');
route::get('/send_receive_store', 'adminController@send_receive_store')->middleware('admin_permission');
route::get('/send_receive_store/delete/{id}', 'adminController@send_receive_store_delete')->middleware('admin_permission');
route::get('/send_receive_store/update/{id}', 'adminController@send_receive_store_update')->middleware('admin_permission');
route::get('/currency_equivalent', 'adminController@currency_equivalent');
route::post('/currency_equivalent', 'adminController@currency_equivalent_post');
route::get('/currency_equivalent/currency_check','adminController@currency_check');

route::get('/admin_review/{id}', 'adminController@show_accept_review')->middleware('admin_permission');
route::get('/admin_review', 'adminController@admin_review')->middleware('admin_permission');
route::get('/admin_review/update/{id}', 'adminController@update_review')->middleware('admin_permission');

route::get('/admin_contact_us', 'adminController@admin_contact_us')->middleware('admin_permission');


route::get('/id_test','bsd24_mainController@adil_test');

route::get('/headline', 'adminController@headline')->middleware('admin_permission');
route::post('/headline', 'adminController@headline_insert')->middleware('admin_permission');
route::get('/headline_update/{id}', 'adminController@headline_update_show')->middleware('admin_permission');
route::post('/headline/update', 'adminController@headline_update')->middleware('admin_permission');
route::get('/headline_delete/{id}', 'adminController@headline_delete_show')->middleware('admin_permission');
route::get('/headline/delete/{id}', 'adminController@headline_delete')->middleware('admin_permission');


route::get('/transaction_fee', 'adminController@transaction_fee')->middleware('admin_permission');
route::post('/transaction_fee', 'adminController@transaction_fee_post')->middleware('admin_permission');