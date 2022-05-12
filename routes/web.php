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

Route::get('/admin/pages', 'HomeController@index')->name('home');

Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function (){
//input_types
Route::get('/input', 'cms\InputController@index');
//pages
Route::name('pages.')->prefix('pages')->group(function (){
    Route::get('/', 'cms\PageController@index')->name('index');
    Route::get('/create', 'cms\PageController@create')->name('create');
    Route::post('/', 'cms\PageController@store')->name('store');
    Route::get('/{page}/edit', 'cms\PageController@edit')->name('edit');
    Route::patch('/{page}', 'cms\PageController@update')->name('update');
    Route::delete('/{page}', 'cms\PageController@destroy')->name('destroy');
    Route::get('/{page}', 'cms\PageController@show')->name('show');

    Route::name('sections.')->prefix('{page}/sections')->group(function() {
        //upload
        Route::post('/{section}/uploads', 'cms\UploadController@store')->name('upload');

        //sections
        Route::get('/create', 'cms\SectionController@create')->name('create');
        Route::post('/', 'cms\SectionController@store')->name('store');
        Route::get('/{section}/edit', 'cms\SectionController@edit')->name('edit');
        Route::patch('/{section}', 'cms\SectionController@update')->name('update');
        Route::delete('/{section}', 'cms\SectionController@destroy')->name('destroy');
        Route::get('/{section}', 'cms\SectionController@show')->name('show');

            //content
        Route::name('contents.')->prefix('{section}/contents')->group(function(){
            Route::post('/', 'cms\ContentController@store')->name('store');
            Route::patch('/', 'cms\ContentController@update')->name('update');
            Route::delete('/{content}', 'cms\ContentController@destroy');
        });
        });



});






//content



//section


//page


});











