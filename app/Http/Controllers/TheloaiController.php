<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_news;
use App\Http\Requests\TheLoaiRequest;

class TheloaiController extends Controller
{
    public function getDanhsach() {
    	$data = type_news::select('id', 'name', 'alias', 'type_news_id', 'created_at')->orderBy('id','DESC')->paginate(5);
    	return view('admin.theloai.danhsach', compact('data'));
    }

    public function getThem() {
        $data = type_news::select('id', 'name', 'alias', 'type_news_id')->get()->toArray();
    	return view('admin.theloai.them', compact('data'));
    }
    public function postThem(TheLoaiRequest $request) {
    	$theloai                 = new type_news;
        $theloai->name           = $request->txtTypeName;
        $theloai->alias          = changeTitle($request->txtTypeName);
        $theloai->type_news_id   = $request->sltloaitincha;
        $theloai->save();
        return redirect()->route('admin.theloai.danhsach')->with(['thongbao_mau' => 'success','thongbao' => 'Thêm thành công !!']);
    }

    public function getXoa($id) {
        $loai_tin_cha = type_news::where('type_news_id', $id)->count();
        if($loai_tin_cha == 0) {
            $theloai = type_news::find($id);
            $theloai->delete($id);
            return redirect()->back()->with(['thongbao_mau' => 'success', 'thongbao'=>'Xóa thành công']);
        } else {
            return redirect()->back()->with(['thongbao_mau' => 'danger', 'thongbao'=>'Không thể xóa loại tin !!']);
        }   
    }

    public function getSua($id) {
        $data = type_news::findOrFail($id)->toArray();
        $loai_tin_cha = type_news::select('id', 'name', 'alias', 'type_news_id')->get()->toArray();
        return view('admin.theloai.sua', compact('loai_tin_cha', 'data'));
    }
    public function postSua(TheLoaiRequest $request, $id) {
        $theloai = type_news::find($id);
        $theloai->name         = $request->txtTypeName;
        $theloai->alias        = changeTitle($request->txtTypeName);
        $theloai->type_news_id = $request->sltloaitincha;
        $theloai->save();
        return redirect()->route('admin.theloai.danhsach')->with(['thongbao_mau'=>'success','thongbao'=>'Sửa loại tin thành công !!']);
    }
}
