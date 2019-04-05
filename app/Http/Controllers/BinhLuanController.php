<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use Auth;

class BinhLuanController extends Controller
{
    public function postBinhluan($id, $alias, Request $request) {
        $binhluan           = new comment;
        $binhluan->content  = $request->addComment;
        $binhluan->users_id = Auth::User()->id;
        $binhluan->news_id  = $id;
        $binhluan->save();
        return redirect("chi-tiet-tin/$id/$alias");
    }
}
