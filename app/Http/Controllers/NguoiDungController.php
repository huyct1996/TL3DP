<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\NguoiDungRequest;
use App\Http\Requests\LoginRequest;
use Hash;
use Auth;

class NguoiDungController extends Controller
{
    public function getDanhsach() {
    	$nguoidung = User::select('id', 'name', 'email', 'level')->paginate(5);
    	return view('admin.nguoidung.danhsach', compact('nguoidung'));
    }
    public function getThem() {
        if(Auth::user()->level == 1) {
            return view('admin.nguoidung.them');
        }else {
            return redirect()->route('admin.nguoidung.danhsach')->with(['thongbao_mau'=>'danger','thongbao'=>'Xin lỗi ! Bạn không có quyền thêm người dùng']);
        }
    }
    public function postThem(NguoiDungRequest $request) {
    	$nguoidung = new User();
    	$nguoidung->name = $request->txtName;
    	$nguoidung->email = $request->txtEmail;
    	$nguoidung->level = $request->rdLevel;
		$nguoidung->password = Hash::make($request->txtPassword);
		$nguoidung->remember_token = $request->_token;
		$nguoidung->save();
		return redirect()->route('admin.nguoidung.danhsach')->with(['thongbao_mau' => 'success','thongbao' => 'Thêm thành công !!']);
    }
    public function getSua($id) {
        $user_current_login = Auth::user()->id;
    	$user = User::find($id);
        if( ($user_current_login != 1) && ($id == 1 || ($user["level"] == 1 && ($user_current_login != $id) ) || (Auth::user()->level == 0 && ($user_current_login != $id && $user["level"] == 0) )  ) ) 
        {
    	   return redirect()->route('admin.nguoidung.danhsach')->with(['thongbao_mau'=>'danger','thongbao'=>'Xin lỗi ! Bạn không có quyền sửa người dùng này']);
        }
        return view('admin.nguoidung.sua', compact('user'));
    }
    public function postSua($id,Request $request) {
    	$user = User::find($id);
        if($request->txtPassword){
            $this->validate($request,
            [
                'txtPassword' => 'same:txtPasswordV|min:8'
            ],
            [
                'txtPassword.same' => 'Mật khẩu xác nhận không đúng',
                'txtPassword.min' => 'Mật khẩu tối thiểu 8 ký tự'
            ]);
            $user->password = Hash::make($request->txtPassword);
        }
        $user->name = $request->txtName;
        $user->level = $request->rdLevel;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->route('admin.nguoidung.danhsach')->with(['thongbao_mau'=>'success','thongbao'=>'Sửa người dùng thành công !!']);
    }

    public function getXoa($id)
    {
        $user_current_login = Auth::user()->id;
        $user = User::find($id);
        if(($id == 1) || ($user_current_login != 1 && $user["level"] == 1) || (Auth::user()->level == 0 && (Auth::user()->level == $user['level']) )) {
            return redirect()->route('admin.nguoidung.danhsach')->with(['thongbao_mau'=>'danger','thongbao'=>'Xin lỗi ! Bạn không có quyền xóa người dùng này']);
        }else{
            $user->delete($id);
            return redirect()->route('admin.nguoidung.danhsach')->with(['thongbao_mau'=>'success','thongbao'=>'Xóa thành công !!']);
        }
    }

    public function getDangnhapAdmin()
    {
        return view('admin.dangnhap');
    }
    public function postDangnhapAdmin(LoginRequest $request)
    {
        if(Auth::attempt(['email'=>$request->txtUsername, 'password' => $request->txtPassword ]) && (Auth::User()->level == 1 || Auth::User()->level == 0 ) ) {
            return redirect()->route('admin.getThongke');
        }
        else
        {
            return redirect()->route('admin.getDangnhap')->with(['thongbao_mau' => 'danger','thongbao' => 'Đăng nhập không thành công !!']);
        }
    }

    public function getDangxuatAdmin() {
        Auth::logout();
        return redirect()->route('admin.getDangnhap');
    }
}
