<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DanhMucController extends Controller
{
    public function loaitin($id) {
    	$loaitindautien = DB::table('news')->where('type_news_id', $id)->orderBy('news.id', 'DESC')->first();
    	$loaitin = DB::table('news')->where('type_news_id', $id)->orderBy('id', 'DESC')->paginate(10);
    	$tenloaitin = DB::table('type_news')->where('id', $id)->first();
    	return view('user.DanhMuc', compact('loaitin', 'loaitindautien', 'tenloaitin'));
    }

    public function tintonghop($id) {
    	$tenloaitin = DB::table('type_news')->where('id', $id)->first();
    	$tintonghopdautien = $tintheloai = DB::table('type_news')->join('news', 'news.type_news_id', '=', 'type_news.id')->where('type_news.type_news_id',$id)->orwhere('news.type_news_id',$id)->orderBy('news.id', 'DESC')->first();
    	$tintonghop = $tintheloai = DB::table('type_news')->join('news', 'news.type_news_id', '=', 'type_news.id')->where('type_news.type_news_id',$id)->orwhere('news.type_news_id',$id)->orderBy('news.id', 'DESC')->paginate(10);
    	return view('user.dmtonghop', compact('tintonghop', 'tenloaitin', 'tintonghopdautien'));
    }
}
