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
Route::get('/seminar/{hifen}','PagesController@seminar');
Route::get('/incoming/{hifen}','PagesController@incoming');
Route::get('/about','PagesController@about');
Route::get('/admin-panel/',function(){
   return view('cpanel.master');
});
Route::get('/admin-panel/post/new/','CpanelPagesController@post');
Route::post('/admin-panel/','CpanelPagesController@store');
Route::post('/admin-panel/create/incoming','CpanelPagesController@storeIncoming');
Route::get('/admin-panel/page/new/','CpanelPagesController@page');
Route::get('/admin-panel/notification/new/','CpanelPagesController@notification');
Route::get('/admin-panel/seminar/new/','CpanelPagesController@seminar');
Route::get('/admin-panel/incoming/new/','CpanelPagesController@incoming');
Route::get('/admin-panel/manageposts/','CpanelPagesController@manageposts');
Route::get('/admin-panel/delete/{hife}/post','CpanelPagesController@delete_post');


Route::post('/admin-panel/upload-image','Upload_Images_Controller@upload');


Route::post('comment/create/','CommentsController@store');

//Route::get('/login',function (){
//    echo Auth::user()->name;
////    print_r(Auth::logout());
//    echo "Loged out";
//});

