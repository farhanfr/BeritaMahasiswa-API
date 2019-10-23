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

//Auth
Route::post('/addmahasiswa', 'SignupController@add_mahasiswa');
Route::post('/loginmahasiswa', 'LoginController@login_mahasiswa');

//Biodata
Route::put('/updatebiodata','BiodataController@edit_bio');

//News
Route::post('/addnews', 'NewsController@add_news');
Route::get('/gettopnews', 'NewsController@get_top_news');
Route::get('/getnewnews', 'NewsController@get_new_news');
Route::get('/getregularnews', 'NewsController@get_regular_news');

