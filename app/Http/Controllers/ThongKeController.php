<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\comment;
use Carbon\Carbon;
use DB;

class ThongKeController extends Controller
{
    public function getThongke(Request $request)
    {
    	return view('admin.thongke.thongke');
    }

	public function getAPI(Request $request)
	{
		$days = $request->input('days', 30);
		// subDays lùi lại $days ngày
		$range = Carbon::now()->subDays($days);

		$stats_users = DB::table('users')
	    ->where('created_at', '>=', $range)
	    ->groupBy('date')
	    ->orderBy('date', 'ASC')
	    ->get([
	    	// Lấy ngày
	    	DB::raw('Date(created_at) as date'),
	    	// Lấy value
	    	DB::raw('COUNT(*) as value')
	    ]);

		return $stats_users;
	}
	public function getAPINews(Request $request)
	{
		$days = $request->input('days', 30);
		// subDays lùi lại $days ngày
		$range = Carbon::now()->subDays($days);

		$stats_news = DB::table('news')
	    ->where('created_at', '>=', $range)
	    ->groupBy('date_news')
	    ->orderBy('date_news', 'ASC')
	    ->get([
	    	// Lấy ngày
	    	DB::raw('Date(created_at) as date_news'),
	    	// Lấy value
	    	DB::raw('COUNT(*) as value')
	    ]);
	    return $stats_news;
	}
}
