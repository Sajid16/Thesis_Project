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
Route::get('/admin-login', function() {
    return view('admin-login');
})->name('login');
Route::post('/admin_login','HomeController@admin_login')->name('admin_login');

Route::post('/save_achievement','HomeController@saveAchievement')->name('save_achievement');
Route::post('/save_semester_doc','HomeController@save_or_update_semester_doc')->name('save_semester_doc');

Route::post('/update_achievement', 'HomeController@updateAchievement')->name('update_achievement');
Route::post('/update_dept', 'HomeController@update_department')->name('update_department');
Route::post('/update_admin_menu', 'HomeController@update_admin_menu')->name('update_admin_menu');

Route::get('/dashboard/{tab?}','HomeController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/pdf','HomeController@pdfview')->name('pdfview');

Route::post('/save_dept','HomeController@save_department')->name('save_department');

Route::post('/save_upcoming_event','HomeController@save_upcoming_event')->name('save_upcoming_event');

Route::post('/save_admin_menu','HomeController@save_adminMenu')->name('save_adminMenu');
Route::post('/save_event','HomeController@save_update_event')->name('save_update_event');

Route::get('/pdf_generator','FacultyController@generate_pdf')->name('pdf_generator');
Route::get('/aust-life','HomeController@austLife')->name('aust-life');
Route::post('/add_story','HomeController@add_story')->name('add_story')->middleware('auth');
Route::get('/delete_achievement/{id}','HomeController@delete_achievement')->name('delete_achievement');
Route::get('/delete_dept/{id}','HomeController@delete_department')->name('delete_department');
Route::get('/delete/{id}','HomeController@delete_adminMenu')->name('delete_adminMenu');
Route::get('/delete_semester/{id}','HomeController@delete_semester')->name('delete_semester');
Route::get('/delete_event/{id}','HomeController@delete_events')->name('delete_events');
Route::get('/delete_up_event/{id}','HomeController@delete_up_events')->name('delete_up_events');


Route::post('/save_employee_position','HomeController@save_employee_position')->name('save_employee_position');
Route::post('/update_employee_position', 'HomeController@update_employee_position')->name('update_employee_position');
Route::get('/delete_employee_position/{id}','HomeController@delete_employee_position')->name('delete_employee_position');

Route::post('/save_library_details','HomeController@save_library_details')->name('save_library_details');
Route::post('/update_library_details', 'HomeController@update_library_details')->name('update_library_details');
Route::get('/delete_library_details/{id}','HomeController@delete_library_details')->name('delete_library_details');


Route::get('/aust-life','HomeController@austLife')->name('aust-life');
Route::post('/add_story','HomeController@add_story')->name('add_story')->middleware('auth');
Route::get('/delete_austlife/{id}','HomeController@delete_story')->name('delete_story');

Route::post('/save_alumni','HomeController@save_alumni')->name('save_alumni');
Route::post('/update_alumni', 'HomeController@update_alumni')->name('update_alumni');
Route::get('/delete_alumni/{id}','HomeController@delete_alumni')->name('delete_alumni');

Route::post('/save_alumni','HomeController@save_alumni')->name('save_alumni');
Route::post('/update_alumni', 'HomeController@update_alumni')->name('update_alumni');
Route::get('/delete_alumni/{id}','HomeController@delete_alumni')->name('delete_alumni');

Route::post('/save_annoucement','HomeController@save_announcement')->name('save_annoucement');
Route::post('/update_annoucement', 'HomeController@update_annoucement')->name('update_annoucement');
Route::get('/delete_annoucement/{id}','HomeController@delete_annoucement')->name('delete_annoucement');

Route::post('/save_employee','HomeController@save_employee')->name('save_employee');
Route::post('/update_employee', 'HomeController@update_employee')->name('update_employee');
Route::get('/delete_employee/{id}','HomeController@delete_employee')->name('delete_employee');

Route::post('/save_deptHead','HomeController@save_deptHead')->name('save_deptHead');
Route::post('/update_deptHead', 'HomeController@update_deptHead')->name('dept_head');
Route::get('/delete_deptHead/{id}','HomeController@delete_deptHead')->name('delete_deptHead');
