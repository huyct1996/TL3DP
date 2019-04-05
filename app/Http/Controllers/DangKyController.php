<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangKyRequest;
use App\User;
use Hash;

class DangKyController extends Controller
{
    public function getDangky($id, $alias) {
    	return view('user.dangky', compact('id', 'alias'));
    }
    public function postDangky(DangKyRequest $request, $id, $alias) {
    	$nguoidung = new User();
    	$nguoidung->name = $request->txtName;
    	$nguoidung->email = $request->txtEmail;
    	$nguoidung->level = 2;
		$nguoidung->password = Hash::make($request->txtPassword);
		$nguoidung->remember_token = $request->_token;
		$nguoidung->save();
		return redirect()->route('getDangky', [$id,$alias])->with(['thongbao_mau' => 'success','thongbao' => 'Đăng ký thành công !!']);
    }
    public function getTrolai($id, $alias) {
    	return redirect("chi-tiet-tin/$id/$alias");
    }
}
