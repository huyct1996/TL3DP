<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
class pdfController extends Controller
{
    public function index($id)
    {	
    	$data = DB::table('news')->where('id', $id)->first();
    	$pdf = PDF::loadView('user.pdf',  compact('data'));
    	return $pdf->stream('tintuc.pdf');
    }
}
