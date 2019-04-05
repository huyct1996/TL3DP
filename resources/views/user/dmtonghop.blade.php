@extends('user.master')
@section('title', 'Danh mục')
@section('noidung')
	<section class="container content">
		<div class="row">
			<div class="col-sm-9">
				<div class="img-avatar">
					<img src="{{ asset('public/admin/uploads/'.$tintonghopdautien->image) }}" alt="">
					<h3><a href="{{ url('chi-tiet-tin', [$tintonghopdautien->id, $tintonghopdautien->alias]) }}">{{ $tintonghopdautien->title }}</a></h3>
					<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($tintonghopdautien->created_at)) !!}</p>
				</div>
				<!-- Tin Danh Mục -->
				<div class="news-generality" style="margin: 20px 0 40px 0">
					<div class="category-title">
						<div class="right-title">
							<h2>{{ $tenloaitin->name }}</h2>
						</div>
						<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
					</div>
					<div class="content-generality">
						@foreach($tintonghop as $tth)
						<div class="row">
							<div class="col-sm-4">
								<div class="img-scale"><img src="{{ asset('public/admin/uploads/'.$tth->image) }}" class="img-fluid" alt="" style="width: 100%; height: 150px;"></div>
							</div>
							<div class="col-sm-8">
								<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($tth->created_at)) !!}</p>
								<h3><a href="{{ url('chi-tiet-tin', [$tth->id, $tth->alias]) }}">{{ $tth->title }}</a></h3>
							</div>
						</div>
						@endforeach
					</div>
					{{ $tintonghop->links() }}
				</div>
				<!-- End Tin Danh Mục -->
			</div>
			<aside class="col-sm-3">
				@include('user.aside')
			</aside>
		</div>
	</section>
@endsection