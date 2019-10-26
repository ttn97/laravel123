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
use App\ChuyenMuc;
use App\TinTuc;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/pages/trangchu','PageController@trangchu');
Route::get('/admin/pages/lienhe','PageController@lienhe');

Route::get('dangki','UserController@getdangki');
Route::post('dangki','UserController@postdangki');

Route::get('/admin/dangnhap','UserController@getDangnhapAdmin');

Route::post('/admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/dangxuat','UserController@getDangXuatAmin');

Route::get('dangnhap','PageController@getdangnhap');
Route::post('dangnhap','PageController@postdangnhap');

Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){

    //--Chuyên Mục--
    Route::group(['prefix'=>'chuyenmuc'],function(){
        
        Route::get('danhsach','ChuyenMucController@getDanhsach');

        Route::get('them','ChuyenMucController@getThem');
        Route::post('them','ChuyenMucController@postThem');

        Route::get('sua/{id}','ChuyenMucController@getSua');
        Route::post('sua/{id}','ChuyenMucController@postSua');

        Route::get('xoa/{id}','ChuyenMucController@getXoa');
    });


    //--Tin Tức--
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','TinTucController@getDanhsach');
        
        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

        Route::get('xoa/{id}','TinTucController@getXoa');
    });

    //--User--
    Route::group(['prefix'=>'user'],function(){
        Route::get('danhsach','UserController@getDanhsach');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('xoa/{id}','UserController@getXoa');
    });

    //--Comment--
    Route::group(['prefix'=>'comment'],function(){
        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
    });

});

