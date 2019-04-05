@extends('user.master')
@section('title', 'Trang chủ')
@section('noidung')
	<section>
		<div class="container content">
			<div class="row">
				<section class="col-sm-9">
					<div id="carousel-example-generic" class="carousel slide custom-carousel" data-ride="carousel">
					   <!-- Indicators -->
					   	<ol class="carousel-indicators">
					      	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					      	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					      	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					   	</ol>
					   	<!-- Wrapper for slides -->
					   	<div class="carousel-inner" role="listbox">
					      	<div class="item active">
					      		<a href="#"><div class="overlay"></div></a>
					         	<img class="carouse-img" src="{!! asset('public/admin/uploads/'.$tinmoinhatsl1->image) !!}" alt="...">
						        <div class="carousel-caption">
						            <h2 class="animated fadeInUp" style="animation-delay: 1s">{!! $tinmoinhatsl1->title !!}</h2>
						        </div>
					      	</div>
					      	@foreach($tinmoinhatsl2 as $tmnsl2)
						    <div class="item">
						    	<a href="#"><div class="overlay"></div></a>
						        <img class="carouse-img" src="{!! asset('public/admin/uploads/'.$tmnsl2->image) !!}" alt="...">
						        <div class="carousel-caption">
						       		<h2 class="animated fadeInLeft" style="animation-delay: 1s">{!! $tmnsl2->title !!}</h2>
						        </div>
						    </div>
						    @endforeach
					   </div>
					   <!-- Controls -->
					  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						   	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						   	<span class="sr-only">Previous</span>
					   	</a>
					   	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						   <span class="sr-only">Next</span>
					  	</a>
					</div>
					<!-- End Slide -->

					<!-- Tin Tong Hop -->
					<div class="news-generality" style="margin: 20px 0 40px 0">
						<div class="category-title">
							<div class="right-title">
								<h2>Tin Tổng Hợp</h2>
							</div>
							<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
						</div>
						<div class="content-generality">
							@foreach($tinchung as $tc)
							<div class="row">
								<div class="col-sm-3">
									<div class="img-scale"><img src="{!! asset('public/admin/uploads/'.$tc->image) !!}" class="img-fluid" alt="" style="width: 100%; height: 150px;"></div>
								</div>
								<div class="col-sm-9">
									<p class="content-time" style="margin: 0px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($tc->created_at)) !!}</p>
									<h3><a href="{{ url('chi-tiet-tin', [$tc->id, $tc->alias]) }}">{!! $tc->title !!}</a></h3>
									<p class="note">{!! $tc->summary !!}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!-- End Tin Tong Hop -->

					<!-- Begin Tin Danh Mục -->
					<div class="cate-news">
						@foreach($loaitin as $lt)
						<div class="category-title">
							<div class="right-title">
								<h2><a href="{!! url('tong-hop',[$lt->id,$lt->alias]) !!}">{!! $lt->name !!}</a></h2>
							</div>
							<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;">
							</div>
						</div>
						<div class="category-box">
							<div class="row">
								<?php
									$tintheloai = DB::table('type_news')->join('news', 'news.type_news_id', '=', 'type_news.id')->where('type_news.type_news_id',$lt->id)->orwhere('news.type_news_id',$lt->id)->orderBy('news.id', 'DESC')->skip(0)->take(4)->get();
								?>
								@foreach($tintheloai as $ttl)

								<div class="col-sm-3">
									<div class="img-scale"><img src="{{ asset('public/admin/uploads/'.$ttl->image) }}" class="img-fluid" alt=""></div>
									<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($ttl->created_at)) !!}</p>
									<h3><a href="{{ url('chi-tiet-tin', [$ttl->id, $ttl->alias]) }}">{{ $ttl->title }}</a></h3>
								</div>
								@endforeach
							</div>
						</div>
						@endforeach
					</div>
					<!-- End Tin Danh Mục -->
				</section>
				<aside class="col-sm-3">
					@include('user.aside')
				</aside>
			</div>
		</div>
	</section>
@endsection