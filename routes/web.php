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

    // Route::middleware('isAdmin')->group(function() {
        //Delete Authors
        Route::get('/authors/delete/{id}', 'AuthorController@delete')->name('deleteAuthors');
    
        //Delete Books
        Route::get('/books/delete/{id}', 'BookController@delete')->name('Books.delete');

        //Delete categories
        Route::get('/categories/delete/{id}', 'CategoryController@delete')->name('categories.delete');
    // });

    //Create Authors
    Route::get('/authors/create', 'AuthorController@create')->name('createAuthors');
    Route::post('/authors/store', 'AuthorController@store')->name('storeAuthors');

    // Update Authors
    Route::get('/authors/edit/{id}', 'AuthorController@edit')->name('editAuthors');
    Route::post('/authors/update/{id}', 'AuthorController@update')->name('updateAuthors');

    //Create Books
    Route::get('/books/create', 'BookController@create')->name('Books.create');
    Route::post('/books/store', 'BookController@store')->name('Books.store');

    // Update Books
    Route::get('/books/edit/{id}', 'BookController@edit')->name('Books.edit');
    Route::post('/books/update/{id}', 'BookController@update')->name('Books.update');

    //Create categories
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoryController@store')->name('categories.store');

    // Update categories
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
    Route::post('/categories/update/{id}', 'CategoryController@update')->name('categories.update');

});



Route::get('/', function () {
    return view('welcome');
});



/* Authors */

// Read Authors
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


/* categories */

//Read categories
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/show/{id}', 'CategoryController@show')->name('categories.show');

