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

// Route::get('/', function () {
//     return view('Home');
// });
//aust lives
Route::get('/aust-life', 'austLivesController@austLife');
//generalpdf
Route::get('/GeneralPDF/{page}', 'generalController@getGeneralData');
//tuition fee
Route::get('/tuitionfees','TuitionFeesController@tuitionfees')->name('tuitionfees');
//Admission info
Route::get('/Admission', 'admissionController@getAdmissionData');
Route::get('/AdmissionPDF/{id}', 'admissionPDFController@getAdmissionData');
// Convocation
Route::get('/convo', 'convoController@getConvoData');
//manual
Route::get('/labManualPDF/{id1}/{id2}', 'labmanualController@labmanual');
//classroutine 
Route::get('/routinePDF/{id1}/{id2}', 'routineController@routine');
// Route::get('/department/routinePDF/{id1}/{id2}', 'routineController@routine');
//course
Route::get('/coursePDF/{id1}/{id2}', 'courseController@course');

// events
Route::get('/convocation', 'eventController@getEventData');
Route::get('/eventList','eventListController@getEventData');
Route::get('/event/{id}', 'eventController@getEventData');
//
// department announcements
Route::get('/department/announcement/{id}', 'announcementController@getAnnouncementData');
Route::get('/department/announcementPDF/{id}','announcementDataController@getAnnouncementData');
Route::get('/department/announcementFilter/{filter}','announcementFilter@getAnnouncementFilterData');


// announcements
Route::get('/announcement/{id}', 'announcementController@getAnnouncementData');
Route::get('/announcementPDF/{id}','announcementDataController@getAnnouncementData');
Route::get('/announcementFilter/{filter}','announcementFilter@getAnnouncementFilterData');
Route::get('/announcementList','announcementListController@getAnnouncementData');
//
Route::get('/', 'HomeController@index')->name('home');
Route::get('/department/{id}', 'DepartmentController@department')->name('department');
Route::get('/aboutdepartment/{id}', 'AboutController@about')->name('aboutdepartment');
Route::get('/facultymember/{id}','FacultyController@faculty')->name('facultymember');
Route::get('/admin/{id}','AdminController@admin')->name('admin');
Route::get('/library','LibraryController@library')->name('library');
Route::get('/alumni','AlumniController@alumni')->name('alumni');
Route::get('/adminlogin', function() {
    return view('admin-login');
})->name('login');
Route::post('/adminlogin','AdminLoginController@adminlogin')->name('adminLogin');
Route::get('/dashboard/{tab?}','AdminLoginController@dashboard')->name('dashboard')->middleware('auth');
Route::post('/add_faculty', 'FacultyController@add_faculty')->name('add_faculty');
// Route::get('/dashboard','AdminLoginController@dashboard')->name('dashboard')->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
