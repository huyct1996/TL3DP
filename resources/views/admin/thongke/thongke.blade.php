@extends('admin.master')
@section('tieude','Thống Kê')
@section('noidung')
	<div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-pills ranges">
			  <li class="active"><a href="#" value='30'>30 Ngày</a></li>
			  <li><a href="#" value='90'>90 Ngày</a></li>
			</ul>
			<label>Thống Kê Tin Tức</label>
			<div class="form-group" id="stats-container-news" style="height: 250px;"></div>
			<label>Thống Kê Người Dùng</label>
			<div class="form-group" id="stats-container" style="height: 250px;"></div>
		</div>
	</div>
@stop