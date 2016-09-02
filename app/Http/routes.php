<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.homepage');
});
Route::get('/post/{hifen}','PagesController@post');
Route::get('/notfication/{hifen}','PagesController@notfication');
Route::get('/about','PagesController@about');
Route::get('/admin-panel/',function(){
   return view('cpanel.master');
});
Route::get('/admin-panel/post/new/','CpanelPagesController@post');
Route::get('/admin-panel/page/new/','CpanelPagesController@page');
Route::get('/admin-panel/notification/new/','CpanelPagesController@notification');
Route::get('/admin-panel/seminar/new/','CpanelPagesController@seminar');
Route::get('/admin-panel/incoming/new/','CpanelPagesController@incoming');
Route::get('/admin-panel/manageposts/','CpanelPagesController@manageposts');



//Route::auth();

//Route::get('/home', 'HomeController@index');
