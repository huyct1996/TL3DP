<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\news;
use App\comment;
use App\User;
use App\Http\Requests\LoginRequest;
use Hash;
use Auth;

class ChiTietController extends Controller
{
    public function chitiettin($id) {
        $news           = news::find($id);
        $news->views    = $news->views + 1;
        $news->save();
        $chitiet        = DB::table('news')->where('id', $id)->first();
        $loaitinchitiet = DB::table('type_news')->where('id',$chitiet->type_news_id)->first();
        $tinlienquan    = DB::table('news')->where('type_news_id',$chitiet->type_news_id)->where('id','<>',$id)->take(4)->get();
        $binhluan       = DB::table('comment')->where('news_id', $id)->orderBy('id', 'DESC')->paginate(4);
        return view('user.ChiTietBaiViet', compact('chitiet', 'loaitinchitiet', 'tinlienquan', 'binhluan'));
    }

    public function postThongtin($id, $alias, Request $request) {
        $user = User::find(Auth::User()->id);
        if($request->txtPassword){
            $this->validate($request,
            [
                'txtPassword' => 'same:txtPasswordV|min:8'
            ],
            [
                'txtPassword.same' => 'Mật khẩu xác nhận không đúng',
                'txtPassword.min' => 'Mật khẩu tối thiểu có 8 ký tự'
            ]);
            $user->password = Hash::make($request->txtPassword);
        }
        $user->name = $request->txtName;
        $user->level = Auth::User()->level;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect("chi-tiet-tin/$id/$alias")->with(['thongbao_mau_tt'=>'success','thongbao_tt'=>'Thay đổi thông tin thành công !!']);
    }

    public function postDangnhapUser($id, $alias, LoginRequest $request)
    {
    	if(Auth::attempt(['email'=>$request->txtUsername, 'password' => $request->txtPassword ])) {
            return redirect("chi-tiet-tin/$id/$alias");
        }
        else
        {
            return redirect("chi-tiet-tin/$id/$alias")->with(['thongbao_mau' => 'danger','thongbao' => 'Đăng nhập không thành công !!']);
        }
    }
    public function getDangxuatUser($id, $alias) {
    	Auth::logout();
        return redirect("chi-tiet-tin/$id/$alias");
    }
}
