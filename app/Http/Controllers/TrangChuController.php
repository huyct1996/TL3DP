<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use App\type_news;
use DB;


class TrangChuController extends Controller
{
    public function trangchu() {
    	$tinmoinhatsl1 = DB::table('news')->orderBy('id', 'DESC')->first();
    	$tinmoinhatsl2 = DB::table('news')->orderBy('id', 'DESC')->skip(1)->take(2)->get();
    	$tinchung =  DB::table('news')->inRandomOrder()->skip(0)->take(4)->get();
    	$loaitin = DB::table('type_news')->where('type_news_id', 0)->get();
    	return view('user.trangchu', compact('tinchung', 'tinmoinhatsl1', 'tinmoinhatsl2', 'loaitin'));
    }

    public function getXuat($id)
	{
	    $news = news::findOrFail($id);
	    $alias = $news->alias;
	    return redirect("chi-tiet-tin/$id/$alias");
	}

	public function getTheoTieuDe(Request $request)
	{
	    $news = news::where('title', 'like', '%' . $request->value . '%')->get();
	    return response()->json($news); 
	}
	public function getTimKiem(Request $request)
	{
		$news_search = news::where('title','LIKE','%'.$request->key.'%')->paginate(10);
		$count = news::where('title','LIKE','%'.$request->key.'%')->get();
		return view('user.timkiem',compact('news_search', 'count'));
	}
}
