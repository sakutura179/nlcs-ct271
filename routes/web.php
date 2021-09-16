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

use Illuminate\Support\Facades\Route;

/*
|
| Route cua front page
|
*/
Route::prefix('/')->middleware('PageAuth')->group(function () {
    Route::get('', 'PageController@mainPage')->name('mainPage');

    Route::get('search/{val}', 'PageController@search');
    
    Route::get('more/{val}', 'PageController@more');
    
    Route::get('category/{slug}', 'PageController@category')->name('category');
    
    Route::get('platform/{id}', 'PageController@platform')->name('platform');  
    
    Route::get('post/{slug}', 'NewsController@post')->name('post');
});


/* 
|
| Login, Logout, Signin
|
*/
Route::get('login', 'AuthController@getLogin')->name('login');
Route::post('login', 'AuthController@postLogin')->name('postLogin');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('signin', 'ViewerController@create')->name('signin');
Route::post('signin', 'ViewerController@add')->name('postSignin');


/* 
|
| Lay lai mat khau
|
*/
Route::get('recovery-password', 'EmailController@getRecovery')->name('recovery');
Route::post('recovery-password', 'EmailController@RecoveryPassword')->name('postRecovery');
// Xac nhan ma
Route::post('recovery', 'EmailController@postCode')->name('postCode');
// Reset password
Route::post('reset', 'EmailController@postReset')->name('postReset');


/*
|
| Admin Route
|
*/

Route::prefix('admin')->middleware('AdminAuth')->group(function () {
    Route::get('home/{id}', 'AdminController@home')->name('admin-home');
    
    Route::prefix('platform')->group(function () {
        Route::get('list', 'PlatformController@show')->name('platform-list');

        Route::get('add', 'PlatformController@create')->name('add-platform');
        Route::post('add', 'PlatformController@add')->name('post-add-platform');

        Route::get('edit/{id}', 'PlatformController@edit')->name('edit-platform');
        Route::post('edit', 'PlatformController@postEdit')->name('post-edit-platform');

        Route::get('delete/{id}', 'PlatformController@destroy')->name('delete-platform');
    });
    
    Route::prefix('category')->group(function () {
        Route::get('list', 'CategoryController@show')->name('category-list');

        Route::get('add', 'CategoryController@create')->name('add-category');
        Route::post('add', 'CategoryController@add')->name('post-add-category');

        Route::get('edit/{id}', 'CategoryController@edit')->name('edit-category');
        Route::post('edit', 'CategoryController@postEdit')->name('post-edit-category');

        Route::get('delete/{id}', 'CategoryController@destroy')->name('delete-category');
    });
    
    Route::prefix('news')->group(function () {
        Route::get('list', 'NewsController@show')->name('news-list');

        Route::get('edit/{id}', 'NewsController@trending')->name('edit-news');

        Route::get('delete/{id}', 'NewsController@destroy')->name('delete-news');
    });
    
    Route::prefix('author')->group(function () {
        Route::get('list', 'AuthorController@show')->name('author-list');

        Route::get('add', 'AuthorController@create')->name('add-author');
        Route::post('add', 'AuthorController@add')->name('post-add-author');

        Route::get('delete/{id}', 'AuthorController@destroy')->name('delete-author');
    });
    
    Route::prefix('viewer')->group(function () {
        Route::get('list', 'ViewerController@show')->name('viewer-list'); 

        Route::get('delete/{id}', 'ViewerController@destroy')->name('delete-viewer');
    });

    Route::prefix('comment')->group(function () {
        Route::get('list/{id}', 'CommentController@show')->name('list-comment');

        Route::get('delete/{idc}/{id}', 'CommentController@destroy')->name('delete-comment');
    });
    
});


/*
|
| Author Route
|
*/
Route::prefix('author')->middleware('AuthorAuth')->group(function () {
    Route::get('home/{id}', 'AuthorController@home')->name('author-home');

    Route::get('edit/{id}', 'AuthorController@edit')->name('edit-author');
    Route::post('edit', 'AuthorController@postEdit')->name('post-edit-author');

    Route::prefix('news')->group(function () {
        Route::get('list/{id}', 'NewsController@authorShow')->name('author-news-list');

        Route::get('add', 'NewsController@create')->name('author-add-news');
        Route::post('add', 'NewsController@add')->name('author-post-add-news');

        Route::get('edit/{id}', 'NewsController@edit')->name('author-edit-news');
        Route::post('edit', 'NewsController@postEdit')->name('author-post-edit-news');
    });

    Route::prefix('comment')->group(function () {
        Route::get('list/{id}', 'CommentController@authorShow')->name('author-list-comment');

        Route::get('delete/{idc}/{id}', 'CommentController@authorDestroy')->name('author-delete-comment');
    });
});


/*
|
| Viewer Route
|
*/
Route::prefix('viewer')->middleware('ViewerAuth')->group(function () {
    Route::get('home/{id}', 'ViewerController@home')->name('viewer-home');

    Route::get('edit-viewer/{id}', 'ViewerController@edit')->name('edit-viewer');
    Route::post('edit-viewer', 'ViewerController@postEdit')->name('post-edit-viewer');

    Route::post('comment', 'CommentController@add')->name('viewer-comment');

    Route::get('edit-comment/{id}/{csrf}', 'CommentController@getEdit')->name('get-edit-comment');
    Route::post('edit-comment', 'CommentController@edit')->name('viewer-edit-comment');

    Route::get('delete-comment/{id}', 'CommentController@delete')->name('viewer-delete-comment');
});


