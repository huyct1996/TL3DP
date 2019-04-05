@extends('user.master')
@section('title', 'Danh mục')
@section('noidung')
	<section class="container content">
		<div class="row">
			<div class="col-sm-9">
				<!-- Tin Danh Mục -->
				<div class="news-generality" style="margin: 20px 0 40px 0">
					<div class="category-title">
						<div class="right-title">
							<h2>Tìm Thấy {!! count($count) !!} Tin Tức</h2>
						</div>
						<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
					</div>
					<div class="content-generality">
						@foreach($news_search as $search)
						<div class="row">
							<div class="col-sm-4">
								<div class="img-scale"><img src="{{ asset('public/admin/uploads/'.$search->image) }}" class="img-fluid" alt="" style="width: 100%; height: 150px;"></div>
							</div>
							<div class="col-sm-8">
								<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($search->created_at)) !!}</p>
								<h3><a href="{{ url('chi-tiet-tin', [$search->id, $search->alias]) }}">{{ $search->title }}</a></h3>
							</div>
						</div>
						@endforeach
					</div>
					{{ $news_search->links() }}
				</div>
				<!-- End Tin Danh Mục -->
			</div>
			<aside class="col-sm-3">
				@include('user.aside')
			</aside>
		</div>
	</section>
@endsection