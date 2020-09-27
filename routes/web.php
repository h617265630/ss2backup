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


Route::get('/',"IndexController@index");
Route::get('/bookListByGenre/{genre}',"IndexController@bookListByGenre");
Route::post('/search','IndexController@search');


Route::get('/we',function(){
    return view('welcome');
});
Auth::routes();

//index page
Route::get('/home', 'HomeController@index')->name('home');
//user
Route::get('/user/reviews','IndexController@reviews');



//book

Route::get('/book/bookDetail/{id}', 'BookController@bookDetailPage');
Route::get('/book/addBookPage', 'BookController@goToAddBookPage')->middleware('member');
Route::post('/book/addBook', 'BookController@store')->middleware('member');
Route::get('/book/editBookPage/{id}', 'BookController@goToEditBookPage')->middleware('member');
Route::post('/book/editBook', 'BookController@editBook')->middleware('member');
Route::get('/book/delete/{id}','BookController@delete')->middleware('member');
Route::post('/book/uploadImage','BookController@upload');
Route::get('/book/highRatingBook','BookController@highRatingBook');

//review
Route::get('/review/addReviewPage/{id}', 'ReviewController@goToAddReviewPage')->middleware('member');
Route::post('/review/addReview', 'ReviewController@store')->middleware('member');
Route::get('/review/editReviewPage/{id}', 'ReviewController@goToEditReviewPage')->middleware('member');
Route::post('/review/editReview', 'ReviewController@editReview')->middleware('member');


//admin user list
Route::get('/admin/userList','AdminController@userList');
Route::get('/admin/approveUser/{user_id}','AdminController@approveUser');

//permisson
Route::get('/noPermission','IndexController@permission');