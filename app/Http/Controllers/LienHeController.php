<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;


class LienHeController extends Controller
{
	public function postLienhe(Request $request) {
		if(request()->ajax())
		{
			$data = ['hoten'=> $request->name,'email'=>$request->email, 'phone'=>$request->phone, 'noidung'=>$request->content];
			Mail::send('user.giaodienmail',$data,function($msg) {
				$msg->from('tieuluan2019@gmail.com','Linh Huy');
				$msg->to('tieuluan2019@gmail.com','Huy Nguyễn')->subject('Đây Là Mail Tin Tức');
			});
			return "Ok";
		}
	}
}
