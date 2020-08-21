<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('courses', 'CoursesController');
Route::resource('students', 'StudentController');
Route::resource('assignments', 'AssignmentController');
Route::post('assignments/file/delete/{assignment_file}', 'AssignmentController@destroyAssignmentFile')->name('file_delete');;
