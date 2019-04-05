<?php
	$tinmoinhat = DB::table('news')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
	$tinnoibat =  DB::table('news')->where('highlights','=','1')->orwhere('views','>','20')->orderBy('id', 'DESC')->skip(0)->take(4)->get();
?>
<!-- sEARCH -->
@if (session('status_rs'))
    <div class="alert alert-success" role="alert">
        {{ session('status_rs') }}
    </div>
@endif
<div class="row search-box">
	<form action="{!! url('tim-kiem') !!}">
		<div class="col-sm-10">
			<input name="key" class="form-control search-input" type="text" placeholder="Vui lòng nhập tiêu đề..." aria-label="Search">
		</div>
		<div class="col-sm-2" style="padding: 0">
			<button class=" btn btn-primary search-btn">
				<i class="fa fa-search"></i>
			</button>
		</div>
	</form>
</div>
<!-- END SEARCH -->
<div class="category-new">
	<div class="category-title">
		<div class="right-title">
			<h2>Tin Mới Nhất</h2>
		</div>
		<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
	</div>
	@foreach($tinmoinhat as $tmn)
	<div class="category-content">
		<div class="img-cate">
			<a href="#"><img class="img-responsive" src="{!! asset('public/admin/uploads/'.$tmn->image) !!}" alt=""></a>
		</div>
		<div class="content-cate">
			<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($tmn->created_at)) !!}</p>
			<h3>
				<a href="{{ url('chi-tiet-tin', [$tmn->id, $tmn->alias]) }}">{!! $tmn->title !!}
					<span class="icon-new"></span>
				</a>
			</h3>
		</div>
	</div>
	@endforeach
</div>
<div class="category-highlights">
	<div class="category-title">
		<div class="right-title">
			<h2>Tin Nổi Bật</h2>
		</div>
		<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
	</div>
	@foreach($tinnoibat as $tnb)
	<div class="category-content">
		<div class="img-cate">
			<a href="#"><img class="img-responsive" src="{!! asset('public/admin/uploads/'.$tnb->image) !!}" alt=""></a>
		</div>
		<div class="content-cate">
			<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i> 18/01/2019</p>
			<h3>
				<a href="{{ url('chi-tiet-tin', [$tnb->id, $tnb->alias]) }}">{!! $tnb->title !!}
				</a>
			</h3>
		</div>
	</div>
	@endforeach
</div>
<div id="ad-content"><img src="{{ asset('public/user/img/Ad/1.jpg') }}" alt="" width="100%"></div>