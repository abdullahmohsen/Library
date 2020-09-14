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

/* Authentication */
//register
Route::get('/register', 'AuthController@register')->name('auth.register');
Route::post('/do-register', 'AuthController@doRegister')->name('auth.doRegister');

//login
Route::get('/login', 'AuthController@login')->name('auth.login');
Route::post('/do-login', 'AuthController@doLogin')->name('auth.doLogin');

Route::middleware('userAuth')->group(function() {

    //logout
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');

    Route::middleware('isAdmin')->group(function() {
    //Delete for Authors
    Route::get('/authors/delete/{id}', 'AuthorController@delete')->name('deleteAuthors');

    //Create for Authors
    Route::get('/authors/create', 'AuthorController@create')->name('createAuthors');
    Route::post('/authors/store', 'AuthorController@store')->name('storeAuthors');

    // Update for Authors
    Route::get('/authors/edit/{id}', 'AuthorController@edit')->name('editAuthors');
    Route::post('/authors/update/{id}', 'AuthorController@update')->name('updateAuthors');

    //Create Books
    Route::get('/books/create', 'BookController@create')->name('Books.create');
    Route::post('/books/store', 'BookController@store')->name('Books.store');

    // Update Books
    Route::get('/books/edit/{id}', 'BookController@edit')->name('Books.edit');
    Route::post('/books/update/{id}', 'BookController@update')->name('Books.update');

    //Delete Books
    Route::get('/books/delete/{id}', 'BookController@delete')->name('Books.delete');
    });

});



Route::get('/', function () {
    return view('welcome');
});



/* Authors */

// Read
Route::get('/authors', 'AuthorController@index')->name('allAuthors');
Route::get('/authors/latest', 'AuthorController@latest')->name('latestAuthors');
Route::get('/authors/show/{id}', 'AuthorController@show')->name('showAuthor');
Route::get('/authors/search/{word}', 'AuthorController@search')->name('searchAuthors');



/* Books */

// Read Books
Route::get('/books', 'BookController@index')->name('allBooks');
// Route::get('/books/latest', 'BookController@latest')->name('latestBooks');
Route::get('/books/show/{id}', 'BookController@show')->name('showBooks');
// Route::get('/books/search/{word}', 'BookController@search')->name('searchBooks');
