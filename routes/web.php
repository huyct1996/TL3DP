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
// User
Route::get('/', 'TrangChuController@trangchu');
Route::get('loai-tin/{id}/{tenloai}',['as' => 'loaitin','uses'=>'DanhMucController@loaitin']);
Route::get('tong-hop/{id}/{tenloai}',['as' => 'tonghop','uses'=>'DanhMucController@tintonghop']);
Route::get('chi-tiet-tin/{id}/{tentin}',['as'=> 'chitiettin','uses'=>'ChiTietController@chitiettin']);
Route::post('dangnhap/{id}/{alias}',['as'=> 'postDangnhap','uses'=>'ChiTietController@postDangnhapUser']);
Route::get('dangxuat/{id}/{alias}',['as'=> 'dangxuat','uses'=>'ChiTietController@getDangxuatUser']);
Route::get('pdf/{id}','pdfController@index');
Route::post('binhluan/{id}/{alias}',['as'=> 'postBinhluan','uses'=>'BinhLuanController@postBinhluan']);
Route::post('thongtin/{id}/{alias}',['as'=> 'postThongtin','uses'=>'ChiTietController@postThongtin']);
Route::get('dangky/{id}/{alias}',['as'=> 'getDangky','uses'=>'DangKyController@getDangky']);
Route::post('dangky/{id}/{alias}',['as'=> 'postDangky','uses'=>'DangKyController@postDangky']);
Route::get('trolai/{id}/{alias}',['as'=> 'getTrolai','uses'=>'DangKyController@getTrolai']);
//Search
Route::get('tintuc/{id}', 'TrangChuController@getXuat');
Route::get('timkiem/tieude', 'TrangChuController@getTheoTieuDe');
Route::get('tim-kiem',['as'=>'search','uses'=>'TrangChuController@getTimKiem']);
// End Search
Route::post('lien-he',['as' => 'postLienhe','uses'=>'LienHeController@postLienhe']);


// END USER


// ROUTE ADMIN
Route::get('dang-nhap', function() {
	return view('admin.dangnhap');
});

Route::get('admin/dangnhap',['as'=>'admin.getDangnhap','uses'=>'NguoiDungController@getDangnhapAdmin']);
Route::post('admin/dangnhap',['as'=>'admin.postDangnhap','uses'=>'NguoiDungController@postDangnhapAdmin']);
Route::get('admin/dangxuat',['as'=>'admin.Dangxuat','uses'=>'NguoiDungController@getDangxuatAdmin']);

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){
	Route::group(['prefix' => 'theloai'], function(){
		Route::get('danhsach',['as'=>'admin.theloai.danhsach','uses'=>'TheloaiController@getDanhsach']);
		Route::get('them',['as'=>'admin.theloai.getThem','uses'=>'TheloaiController@getThem']);
		Route::post('them',['as'=>'admin.theloai.postThem','uses'=>'TheloaiController@postThem']);
		Route::get('sua/{id}',['as'=>'admin.theloai.getSua','uses'=>'TheloaiController@getSua']);
		Route::post('sua/{id}',['as'=>'admin.theloai.postSua','uses'=>'TheloaiController@postSua']);
		Route::get('xoa/{id}',['as'=>'admin.theloai.getXoa','uses'=>'TheloaiController@getXoa']);
	});
	Route::group(['prefix' => 'tintuc'], function(){
		Route::get('danhsach',['as'=>'admin.tintuc.danhsach','uses'=>'TinTucController@getDanhsach']);
		Route::get('them',['as'=>'admin.tintuc.getThem','uses'=>'TinTucController@getThem']);
		Route::post('them',['as'=>'admin.tintuc.postThem','uses'=>'TinTucController@postThem']);
		Route::get('sua/{id}',['as'=>'admin.tintuc.getSua','uses'=>'TinTucController@getSua']);
		Route::post('sua/{id}',['as'=>'admin.tintuc.postSua','uses'=>'TinTucController@postSua']);
		Route::get('xoa/{id}',['as'=>'admin.tintuc.getXoa','uses'=>'TinTucController@getXoa']);
		Route::get('xoaCM/{id}/{newsid}',['as'=>'admin.tintuc.getXoaCM','uses'=>'TinTucController@getXoaCM']);
	});
	Route::group(['prefix' => 'nguoidung'], function(){
		Route::get('danhsach',['as'=>'admin.nguoidung.danhsach','uses'=>'NguoiDungController@getDanhsach']);
		Route::get('them',['as'=>'admin.nguoidung.getThem','uses'=>'NguoiDungController@getThem']);
		Route::post('them',['as'=>'admin.nguoidung.postThem','uses'=>'NguoiDungController@postThem']);
		Route::get('sua/{id}',['as'=>'admin.nguoidung.getSua','uses'=>'NguoiDungController@getSua']);
		Route::post('sua/{id}',['as'=>'admin.nguoidung.postSua','uses'=>'NguoiDungController@postSua']);
		Route::get('xoa/{id}',['as'=>'admin.nguoidung.getXoa','uses'=>'NguoiDungController@getXoa']);
	});
	Route::get('thongke',['as'=>'admin.getThongke','uses'=>'ThongKeController@getThongke']);
	Route::get('api',['as'=>'admin.getAPI','uses'=>'ThongKeController@getAPI']);
	Route::get('api-news',['as'=>'admin.getAPINews','uses'=>'ThongKeController@getAPINews']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
