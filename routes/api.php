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
//Route::get('listCourse','apiController@index')->name('getCourse');

Route::get('listCourse','CourseController@index')->name('getCourse');
Route::post('addCourse','CourseController@addCourse')->name('addCourse');

Route::get('listStudent','StudentController@index')->name('getStudent');
Route::post('addStudent','StudentController@addStudent')->name('addStudent');

Route::get('listClass','ClassController@index')->name('getClass');
Route::post('addClass','ClassController@addClass')->name('addClass');

Route::get('listTeacher','TeacherController@index')->name('getTeacher');
Route::get('addTeacher','TeacherController@addTeacher')->name('addTeacher');

Route::get('listQualification','QualificationController@index')->name('getQualification');
Route::post('addQualification','QualificationController@addQualification')->name('addQualification');

Route::get('listPay','PayController@index')->name('getPay');
Route::post('addPay','PayController@addPay')->name('addPay');