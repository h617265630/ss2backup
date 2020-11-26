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
Route::get('/book/addBookPage', 'BookController@goToAddBookPage')->middleware('guestUser')->middleware('curator');
Route::post('/book/addBook', 'BookController@store')->middleware('guestUser')->middleware('curator');
Route::get('/book/editBookPage/{id}', 'BookController@goToEditBookPage')->middleware('guestUser')->middleware('member');
Route::post('/book/editBook', 'BookController@editBook')->middleware('guestUser')->middleware('member');
Route::get('/book/delete/{id}','BookController@delete')->middleware('guestUser')->middleware('member')->middleware('curator');
Route::post('/book/uploadImage','BookController@upload');
Route::get('/book/highRatingBook','BookController@highRatingBook');
Route::get('/book/bookRecommendation','BookController@bookRecommendation');
//review
Route::get('/review/addReviewPage/{id}', 'ReviewController@goToAddReviewPage')->middleware('guestUser');
Route::post('/review/addReview', 'ReviewController@store')->middleware('guestUser');
Route::get('/review/editReviewPage/{id}', 'ReviewController@goToEditReviewPage')->middleware('guestUser');
Route::post('/review/editReview', 'ReviewController@editReview')->middleware('guestUser');

//admin
Route::get('/admin/userList','AdminController@userList');
Route::get('/admin/approveUser/{user_id}','AdminController@approveUser');
Route::get("/admin/addAuthorPage",'AdminController@addAuthorPage')->middleware('guestUser')->middleware('member')->middleware('curator');
Route::post("/admin/addAuthor",'AdminController@addAuthor');

//permisson
Route::get('/noPermission','IndexController@permission');


//du li zhan

Route::get('/duli/flow','DuLiController@flow');