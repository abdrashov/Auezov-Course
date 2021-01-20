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
*/


Route::group(
   [ 
      'prefix' => LocalizationService::locale(),
      'middleware' => 'set_locale',
	],function () {

	Auth::routes([
		'reset' => false,
		'confirm' => false,
		'varify' => false,
	]);

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('/', 'MainController@index')->name('/');
	Route::middleware(['is_status_course'])->group(function () {
		Route::get('/course/{course}', 'MainController@course')->name('course');
	});
	Route::get('/q', 'MainController@search')
	->name('search');


	Route::group([
		'middleware' => 'auth',
		'namespace'  => 'Person',
	], function(){
		Route::post('signCourse/{course}', 'PersonController@signCourse')->name('signCourse');
		Route::get('/home', 'MainController@home')->name('home');
		Route::get('/user/course', 'MainController@userCourse')->name('userCourse');

		Route::middleware(['is_status_course', 'is_sign_course'])->group(function () {
			Route::get('/module/{course}', 'MainController@module')->name('module');
			Route::get('/module/{course}/trainings/{training}', 'MainController@training')
			->name('training');
			Route::get('/module/{course}/tests/{training}', 'TestController@test')
			->name('test');
		});
		Route::post('/test/result/{TestResult}', 'TestController@testAdd')
		->name('testAdd');
	});
});

Route::middleware(['auth'])->group(function () {
	Route::group([
		'middleware' => 'is_admin',
		'prefix' => 'admin',
		'namespace' => 'Admin',
		'as' => 'admin.'
	], function(){
		Route::get('/', 'MainController@index')->name('index');
		Route::resource('categories', 'CategoryController');
		Route::resource('courses', 'CourseController');
		Route::resource('lectures', 'LectureController');
		Route::resource('users', 'UserController');
		Route::resource('modules', 'ModuleController');
		Route::resource('lessons', 'LessonController');
		Route::resource('trainings', 'TrainingController');
		Route::resource('tests', 'TestController');
	});
});
