<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use App\type_news;
use App\comment;
use App\Http\Requests\TinTucRequest;
use App\Http\Requests\TinTucSuaRequest;
use Input,File;

class TinTucController extends Controller
{
    public function getDanhsach() {
    	$data = news::select('id', 'title', 'summary', 'content', 'image', 'highlights', 'views', 'type_news_id', 'created_at', 'updated_at')->orderBy('id','DESC')->paginate(5);
    	return view("admin.tintuc.danhsach", compact('data'));
    }

    public function getThem() {
        $data = type_news::select('id', 'name', 'alias', 'type_news_id')->get()->toArray();
        return view('admin.tintuc.them', compact('data'));
    }

    public function postThem(TinTucRequest $request) {
        $filename = $request->file('fImages')->getClientOriginalName();
        $news              = new news();
        $news->title       = $request->txtTitle;
        $news->alias       = changeTitle($request->txtTitle);
        $news->summary     = $request->txtSummary;
        $news->content     = $request->txtContent;
        $news->image       = $filename;
        $news->views       = 0;
        $news->highlights  = $request->rdHighlights;
        $news->type_news_id = $request->sltloaitincha;
        $request->file('fImages')->move('public/admin/uploads/',$filename);
        $news->save();
        return redirect()->route('admin.tintuc.danhsach')->with(['thongbao_mau' => 'success','thongbao' => 'Thêm thành công !!']);
    }

    public function getSua($id) {
        $loai_tin_cha = type_news::select('id', 'name', 'alias', 'type_news_id')->get()->toArray();
        $news = news::find($id);
        $comment = comment::where("news_id", $news->id)->paginate(5);
        return view('admin.tintuc.sua', compact('loai_tin_cha', 'comment', 'news'));
    }

    public function postSua(TinTucSuaRequest $request, $id) {
        $news = news::find($id);
        $news->title = $request ->txtTitle;
        $news->alias = changeTitle($request ->txtTitle);
        $news->summary = $request ->txtSummary;
        $news->content = $request ->txtContent;
        $news->highlights = $request ->rdHighlights;
        $news->type_news_id = $request ->sltloaitincha;
        $img_current = 'public/admin/uploads/'.$request ->img_current;;
        if(!empty($request ->fImages)) {
            //Lấy tên file
            $file_name = $request ->fImages->getClientOriginalName();
            //Update vào database
            $news->image = $file_name;
            //Kiểm tra và chuyển vào folder cần
            $request ->fImages->move('public/admin/uploads/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
        $news->save();
        return redirect()->route('admin.tintuc.danhsach')->with(['thongbao_mau'=>'success','thongbao'=>'Sửa  tin tức thành công !!']);
    }

    public function getXoa($id) {
        $news = news::find($id);
        File::delete('public/admin/uploads/'.$news->image);
        $news->delete($id);
        return redirect()->route('admin.tintuc.danhsach')->with(['thongbao_mau'=>'success','thongbao'=>'Xóa  tin tức thành công !!']);
    }

    public function getXoaCM($id, $newsid) {
        $binh_luan = comment::find($id);
        $binh_luan->delete($id);
        return redirect()->route('admin.tintuc.getSua', [$newsid])->with(['thongbao_mau' => 'success','thongbao' => 'Xóa bình luận thành công !!']);
    }

}
