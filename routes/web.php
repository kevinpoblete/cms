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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//input_types
Route::get('/input', 'cms\InputController@index');

//upload
Route::post('/pages/{page}/sections/{section}/uploads', 'cms\UploadController@store');




//content
Route::post('/pages/{page}/sections/{section}/contents', 'cms\ContentController@store');
Route::patch('/pages/{page}/sections/{section}/contents', 'cms\ContentController@update')->name('page.section');
Route::delete('/pages/{page}/sections/{section}/contents/{content}', 'cms\ContentController@destroy');


//section
Route::get('/pages/{page}/sections/create', 'cms\SectionController@create');
Route::post('/pages/{page}/sections', 'cms\SectionController@store');
Route::get('/pages/{page}/sections/{section}/edit', 'cms\SectionController@edit');
Route::patch('/pages/{page}/sections/{section}', 'cms\SectionController@update');
Route::delete('/pages/{page}/sections/{section}', 'cms\SectionController@destroy');
Route::get('/pages/{page}/sections/{section}', 'cms\SectionController@show');

//page
Route::get('/pages', 'cms\PageController@index')->name('page');
Route::get('/pages/create', 'cms\PageController@create');
Route::post('/pages', 'cms\PageController@store');
Route::get('/pages/{page}/edit', 'cms\PageController@edit');
Route::patch('/pages/{page}', 'cms\PageController@update');
Route::delete('/pages/{page}', 'cms\PageController@destroy');
Route::get('/pages/{page}', 'cms\PageController@show');





