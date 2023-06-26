<?php

use Illuminate\Support\Facades\Route;
use App\models\News;

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

Route::get('/','PageController@home');
Route::get('/gioi-thieu.html','PageController@about');

Route::get('news',function (){
    $views = news::where(['status'=>1])->orderBy('views', 'desc')->get();
    return $views;
});
//Route::resource()
Route::get('home','PageController@home');
Route::get('category/{id}/{slug}.html','PageController@category');
Route::get('detail/{id}/{slug}.html','PageController@detail');
Route::get('profile','PageController@profile');
Route::get('search', 'PageController@search');

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function (){
    Route::group(['prefix'=>'category'],function (){
        Route::get('list','categoryController@list');
        Route::get('add','categoryController@add');
        Route::post('add','categoryController@postadd');
        Route::get('update/{id}','categoryController@update');
        Route::post('update/{id}','categoryController@postupdate');
        Route::post('trash','categoryController@trash');
        Route::post('upstatus','categoryController@upstatus');
    });
    Route::group(['prefix'=>'comment'],function (){
        Route::get('list','CommentController@list');
        Route::post('trash','CommentController@trash');
        Route::post('upstatus','CommentController@upstatus');
    });
    Route::group(['prefix'=>'contact'],function (){
        Route::get('list','ContactController@list');
        Route::post('trash','ContactController@trash');
        Route::post('upstatus','ContactController@upstatus');
    });
    Route::group(['prefix'=>'menu'],function (){
        Route::get('list','MenuController@list');
        Route::get('add','MenuController@add');
        Route::post('add','MenuController@postadd');
        Route::get('update/{id}','MenuController@update');
        Route::post('update/{id}','MenuController@postupdate');
        Route::post('trash','MenuController@trash');
        Route::post('upstatus','MenuController@upstatus');
    });
    Route::group(['prefix'=>'news'],function (){
        Route::get('list','newsController@list');
        Route::get('add','newsController@add');
        Route::post('add','newsController@postadd');
        Route::get('update/{id}','newsController@update');
        Route::post('update/{id}','newsController@postupdate');
        Route::post('trash','newsController@trash');
        Route::post('upstatus','newsController@upstatus');
    });
    Route::group(['prefix'=>'users'],function (){
        Route::get('list','UserController@list');
        Route::get('add','UserController@add');
        Route::post('add','UserController@postadd');
        Route::get('update/{id}','UserController@update');
        Route::post('update/{id}','UserController@postupdate');
        Route::post('trash','UserController@trash');
        Route::post('upstatus','UserController@upstatus');
    });
});
Route::group(['prefix'=>'account'],function (){
    Route::get('login','AccountController@login');
    Route::post('login','AccountController@postlogin');
    Route::post('upstatus','AccountController@upstatus');
    Route::get('signup','AccountController@signup');
    Route::post('register','AccountController@register');
    Route::get('logout','AccountController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
