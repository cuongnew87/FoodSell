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

Route::get('index', 'PageController@getTrangChu');

Route::get('thanh-toan', 'PageController@getThanhToan');

Route::post('thanh-toan','PageController@postThanhToan');

Route::get('gioi-thieu', 'PageController@getGioiThieu');

Route::get('lien-he', 'PageController@getLienHe');

Route::get('gio-hang', 'PageController@getGioHang');

Route::post('gio-hang/{id}','PageController@postGioHang');

Route::get('xoa-gio-hang/{id}','PageController@getXoaGioHang');

Route::get('xoa-review-cart/{id}','PageController@getDel_review_cart');

Route::post('cap-nhat-review-cart','PageController@postUpdate_Review_cart');





Route::get('danh-sach-tin', 'PageController@getDanhSachTin');

Route::get('chi-tiet-tin', 'PageController@getChiTietTin');

Route::get('danh-sach-sp/{id}', 'PageController@getDanhSachSp');

Route::post('review/{id}','PageController@postReview');

Route::get('danh-sach-sp-danhmuc/{id}', 'PageController@getDanhSachSpDanhMuc');

Route::get('chi-tiet-sp/{id}', 'PageController@getChiTietSp');

Route::get('tim-kiem-sp','PageController@getTimKiemSp');

Route::get('dang-nhap-dang-ki', 'PageController@getDangNhapDangKy');

Route::get('reset', 'PageController@getReset');

Route::post('reset', 'PageController@postReset');

Route::get('/forget-password', 'ForgotPasswordController@getEmail');

Route::post('/forget-password', 'ForgotPasswordController@postEmail');

Route::post('dang-ki', 'PageController@postDangKy');

Route::post('dang-nhap','PageController@postDangNhap');

Route::get('dang-xuat','PageController@getDangXuat');

Route::get('thong-tin-tai-khoan/{id}', 'PageController@getThongTinTaiKhoan');

Route::post('thong-tin-tai-khoan/{id}','PageController@postThongTinTaiKhoan');

Route::get('lich-su-mua-hang/{id}', 'PageController@getLichSuMuaHang');

Route::get('xoa-lich-su-mua-hang/{id}', 'PageController@getXoaLichSuMuaHang');



/* -------------------------------------------------------ADMIN-------------------------------------------------------------------------------------- */


Route::group(['prefix'=>'admin', 'middleware' => ['isAdmin']],function(){

    Route::group(['prefix'=>'slide'],function(){
        Route::get('danhsach', 'AdminController@getDanhSachSlide');

        Route::get('them', 'AdminController@getThemSlide');
        Route::post('them','AdminController@postThemSlide');

        Route::get('sua/{id}', 'AdminController@getSuaSlide');
        Route::post('sua/{id}', 'AdminController@postSuaSlide');


        Route::get('xoa/{id}', 'AdminController@getXoaSlide');



    });

    Route::group(['prefix'=>'CategoryProduct'],function(){
        Route::get('danhsach', 'AdminController@getDanhSachCategoryProduct');

        Route::get('them', 'AdminController@getThemCategoryProduct');
        Route::post('them','AdminController@postThemCategoryProduct');

        Route::get('sua/{id}', 'AdminController@getSuaCategoryProduct');
        Route::post('sua/{id}', 'AdminController@postSuaCategoryProduct');


        Route::get('xoa/{id}', 'AdminController@getXoaCategoryProduct');



    });


    Route::group(['prefix'=>'TypeProduct'],function(){
        Route::get('danhsach', 'AdminController@getDanhSachTypeProduct');

        Route::get('them', 'AdminController@getThemTypeProduct');
        Route::post('them','AdminController@postThemTypeProduct');

        Route::get('sua/{id}', 'AdminController@getSuaTypeProduct');
        Route::post('sua/{id}', 'AdminController@postSuaTypeProduct');

        Route::get('xoa/{id}', 'AdminController@getXoaTypeProduct');
    });

    Route::group(['prefix'=>'Product'],function(){
        Route::get('danhsach', 'AdminController@getDanhSachProduct');

        Route::get('them', 'AdminController@getThemProduct');
        Route::post('them','AdminController@postThemProduct');

        Route::get('sua/{id}', 'AdminController@getSuaProduct');
        Route::post('sua/{id}', 'AdminController@postSuaProduct');


        Route::get('xoa/{id}', 'AdminController@getXoaProduct');
    });

    Route::group(['prefix'=>'User'],function(){
        Route::get('danhsach', 'AdminController@getDanhSachUser');
    });



});
