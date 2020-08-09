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

use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap', ['as' => 'admin.dangnhap', 'uses' => 'UserController@getlLoginAdmin']);
Route::post('admin/dangnhap', ['uses' => 'UserController@postLoginAdmin']);
Route::get('admin/logout', ['uses' => 'UserController@getLogout']);

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('list', ['as' => 'admin.theloai.getList', 'uses' => 'TheLoaiController@getList']);

        Route::get('edit/{id}', ['as' => 'getEdit', 'uses' => 'TheLoaiController@getEdit']);
        Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'TheLoaiController@postEdit']);

        Route::get('delete/{id}', ['as' => 'getDelete', 'uses' => 'TheLoaiController@getDelete']);

        Route::get('add', ['as' => 'getAdd', 'uses' => 'TheLoaiController@getAdd']);
        Route::post('add', ['as' => 'getAdd', 'uses' => 'TheLoaiController@postAdd']);
    });

    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('list', ['as' => 'admin.loaitin.getList', 'uses' => 'LoaiTinController@getList']);

        Route::get('edit/{id}', ['as' => 'getEdit', 'uses' => 'LoaiTinController@getEdit']);
        Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'LoaiTinController@postEdit']);

        Route::get('delete/{id}', ['as' => 'getDelete', 'uses' => 'LoaiTinController@getDelete']);

        Route::get('add', ['as' => 'getAdd', 'uses' => 'LoaiTinController@getAdd']);
        Route::post('add', ['as' => 'getAdd', 'uses' => 'LoaiTinController@postAdd']);
    });
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('list', ['as' => 'admin.tintuc.getList', 'uses' => 'TinTucController@getList']);

        Route::get('edit/{id}', ['as' => 'getEdit', 'uses' => 'TinTucController@getEdit']);
        Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'TinTucController@postEdit']);

        Route::get('delete/{id}', ['as' => 'getDelete', 'uses' => 'TinTucController@getDelete']);

        Route::get('add', ['as' => 'getAdd', 'uses' => 'TinTucController@getAdd']);
        Route::post('add', ['as' => 'getAdd', 'uses' => 'TinTucController@postAdd']);
    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('delete/{id}', ['as' => 'getDelete', 'uses' => 'CommentController@getDelete']);
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('list', ['as' => 'admin.slide.getList', 'uses' => 'SlideController@getList']);

        Route::get('edit/{id}', ['as' => 'getEdit', 'uses' => 'SlideController@getEdit']);
        Route::post('edit/{id}', ['as' => 'postEdit', 'uses' => 'SlideController@postEdit']);

        Route::get('delete/{id}', ['as' => 'getDelete', 'uses' => 'SlideController@getDelete']);

        Route::get('add', ['as' => 'getAdd', 'uses' => 'SlideController@getAdd']);
        Route::post('add', ['as' => 'getAdd', 'uses' => 'SlideController@postAdd']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('add', ['as' => 'admin.user.getAdd', 'uses' => 'UserController@getAdd']);
        Route::post('add', ['as' => 'admin.user.postAdd', 'uses' => 'UserController@postAdd']);

        Route::get('list', ['as' => 'admin.user.list', 'uses' => 'UserController@getList']);

        Route::get('delete/{id}', ['as' => 'admin.user.getDelete', 'uses' => 'UserController@getDelete']);

        Route::get('edit/{id}', ['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit']);
    });
});

// Guest, Front-End
Route::get('/', 'PageController@homePage');

Route::get('/home', 'PageController@homePage');
Route::get('contact-us', 'PageController@contact');
Route::get('loaitin/{id}/{TenKhongDau}', 'PageController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}', 'PageController@detialTinTuc');

Route::get('register', 'PageController@getRes');
Route::post('register', 'UserController@postRes');
Route::get('login', 'PageController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('logout', 'PageController@getLogout');


Route::post('comment/{id}', 'CommentController@postComment');

Route::get('user/{id}/{name}', 'PageController@getUser');
Route::post('user/{id}/{name}', 'UserController@postUser');

Route::post('search', 'PageController@timkiem');
