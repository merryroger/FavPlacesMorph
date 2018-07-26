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

Route::prefix('places')->group(function () {

    Route::name('photo.')->group(function () {

        Route::post('/photos/add', 'PlaceController@doAddPhoto')->name('post_form');

        Route::get('/{id}/photos/add', 'PlaceController@addPhoto')->name('get_linked_form');

        Route::get('/{id}/{mark}/photos/like', 'PhotoController@likePhoto')->name('like');
    });

    Route::name('place.')->group(function () {

        Route::post('/create', 'PlaceController@doAddPlace')->name('post_form');

        Route::get('/{id}/{mark}/places/like', 'PlaceController@likePlace')->name('like');

        Route::get('/create', 'PlaceController@addPlace')->name('get_form');

        Route::get('/{id}/', 'PlaceController@showPlace')->name('show');

        Route::get('/', 'PlaceController@placeList')->name('show_all');

    });

});

Route::get('/photos/add', 'PlaceController@addAnyPhoto')->name('photo.get_wildcard_form')->middleware(['menu']);

Route::redirect('/', 'places');
