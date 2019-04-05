@extends('user.master')
@section('title', 'Chi tiết bài viết')
@section('noidung')
	<section class="container content">
		<div class="row">
			<div class="col-sm-9">
				<header class="title-posts">
					<p>
						<a href="{{ url('tong-hop',[$loaitinchitiet->id, $loaitinchitiet->alias]) }}">{{ $loaitinchitiet->name }}</a>
					</p>
					<h1>{{ $chitiet->title }}</h1>
					<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($chitiet->created_at)) !!}&nbsp&nbsp
						<i class="fa fa-eye">&nbsp{{ $chitiet->views }}</i>&nbsp&nbsp
						<a style="color:black" href="{{ url('pdf', $chitiet->id) }}"><i class="fa fa-print"></i></a></p>
				</header>
				<section class="content-posts">
					<p>{!! $chitiet->content !!}</p>
				</section>
				<section class="comment-posts">
					<div class="category-title">
						<div class="right-title">
							<h2>Bình Luận Bài Viết</h2>
						</div>
						<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
					</div>
					<!-- ĐÃ LOGIN -->
					@if(Auth::check())
					<div id="sublog-comment">
						<div class="page-header">
				            <h3 class="reviews">Để lại bình luận bạn tại đây</h3>
				            <div class="sublog-comment">
				                <button class="btn btn-default btn-circle text-uppercase" type="button">
				                   <a href="{{ url('dangxuat', [$chitiet->id, $chitiet->alias]) }}" style="color:black; text-decoration: none"><span class="glyphicon glyphicon-off"></span>
				                    Đăng Xuất</a>                    
				                </button>                
				            </div>
				        </div>
				        <div class="comment-tabs">
				            <ul class="nav nav-tabs" role="tablist">
				                <li class="active">
				                	<a href="#comments-logout" role="tab" data-toggle="tab">
				                		<h4 class="reviews text-capitalize">Xem Bình Luận</h4>
				                	</a>
				                </li>
				                <li>
				                	<a href="#add-comment" role="tab" data-toggle="tab">
				                		<h4 class="reviews text-capitalize">Bình Luận</h4>
				                	</a>
				                </li>
				                <li>
				                	<a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Thay Đổi Thông Tin</h4>
				                	</a>
				                </li>
				            </ul>            
				            <div class="tab-content">
				                <div class="tab-pane active" id="comments-logout">         
				                    <ul class="media-list">
				                    	@foreach($binhluan as $bl)
				                      	<li class="media">
					                        <a class="pull-left" href="#">
					                          <img class="media-object img-circle" src="{{ asset('public/image/meo.jpg') }}" alt="profile">
					                        </a>
					                        <div class="media-body">
					                          	<div class="well well-lg">
					                          	<?php
					                          		$tenbl = DB::table('users')->where('id', $bl->users_id)->first()
					                          	?>
					                              	<h4 style="font-size: 15px;" class="media-heading text-uppercase reviews">{!! $tenbl->name !!}</h4>
					                              	<ul class="media-date text-uppercase reviews list-inline">
					                                	<li class="dd">{!! date("d/m/Y H:i:m", strtotime($bl->created_at)) !!}</li>
					                              	</ul>
						                              <p class="media-comment">
						                                {!! $bl->content !!}
						                              </p>
					                          	</div>              
					                        </div>
				                      	</li>
				                      	@endforeach         
				                    </ul>
				                    {{ $binhluan->links() }}
				                </div>
				                <div class="tab-pane" id="add-comment">
				                    <form action="{!! url('binhluan', [$chitiet->id, $chitiet->alias]) !!}" class="form-horizontal" id="commentForm" role="form" method="POST">
				                    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				                        <div class="form-group">
				                            <label for="email" class="col-sm-2 control-label">Bình Luận</label>
				                            <div class="col-sm-10">
				                              <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <div class="col-sm-offset-2 col-sm-10">                    
				                                <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span>Gửi</button>
				                            </div>
				                        </div>            
				                    </form>
				                </div>
				                <div class="tab-pane" id="account-settings">
				                    <form action="{!! url('thongtin', [$chitiet->id, $chitiet->alias]) !!}" method="post" class="form-horizontal" id="accountSetForm" role="form">
				                    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
				                        <div class="form-group">
				                            <label for="name" class="col-sm-2 control-label">Tên</label>
				                            <div class="col-sm-10">
				                              	<input type="text" value="{{ Auth::User()->name }}" class="form-control" name="txtName" id="name" placeholder="Vui lòng nhập tên" >
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <label for="email" class="col-sm-2 control-label">Email</label>
				                            <div class="col-sm-10">
				                              <input type="email" value="{{ Auth::User()->email }}" class="form-control" name="txtEmail" id="email-comment" readonly="true">
				                            </div>
				                        </div>  
				                        <div class="form-group">
				                            <label for="txtPassword" class="col-sm-2 control-label">Mật khẩu mới</label>
				                            <div class="col-sm-10">
				                              <input type="password" class="form-control" name="txtPassword">
				                            </div>
				                        </div> 
				                        <div class="form-group">
				                            <label for="confirmPassword" class="col-sm-2 control-label">Mật khẩu xác nhận</label>
				                            <div class="col-sm-10">
				                              <input type="password" class="form-control" name="txtPasswordV">
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <div class="col-sm-offset-2 col-sm-10">                    
				                                <button class="btn btn-primary btn-circle text-uppercase" type="submit" id="submit">Lưu thay đổi</button>
				                            </div>
				                        </div>            
				                    </form>
				                </div>
				            </div>
		        		</div>
					</div>
					@else
					<!-- END ĐÃ LOGIN -->

					<!-- CHƯA LOGIN -->
					<div id="nolog-comment">
						<div class="page-header">
			            <h3 class="reviews">Vui lòng đăng nhập để bình luận bài viết</h3>
			        	</div>
				        <div class="comment-tabs">
				            <ul class="nav nav-tabs" role="tablist">
				                <li class="active"><a href="#comments-login" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Xem Bình Luận</h4></a></li>
				            </ul>            
				            <div class="tab-content">
				                <div class="tab-pane active" id="comments-login"> 
				                @foreach($binhluan as $bl)          
				                    <ul class="media-list">
				                      	<li class="media">
					                        <a class="pull-left" href="#">
					                          <img class="media-object img-circle" src="{{ asset('public/image/meo.jpg') }}" alt="profile">
					                        </a>
					                        <div class="media-body">
					                          <div class="well well-lg">
					                          	<?php
					                          		$tenbl = DB::table('users')->where('id', $bl->users_id)->first()
					                          	?>
					                              <h4 style="font-size: 15px;" class="media-heading text-uppercase reviews">{!! $tenbl->name !!}</h4>
					                              <ul class="media-date text-uppercase reviews list-inline">
					                                <li class="dd">{!! date("d/m/Y H:i:m", strtotime($bl->created_at)) !!}</li>
					                              </ul>
					                              <p class="media-comment">
					                               	{{ $bl->content }}
					                              </p>
					                          </div>              
					                        </div>
				                      	</li>     
				                    </ul>
				                @endforeach
				                {{ $binhluan->links() }}
				                </div>
				            </div>
				        </div>
					</div>
					<!-- END CHƯA ĐĂNG NHẬP -->
					@endif
				</section>
			</div>
			<aside class="col-sm-3">
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul style="padding: 0;">
							@foreach($errors->all() as $error)
								<li style="list-style: none;">{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if(Session::has('thongbao_tt'))
					<div class="alert alert-{!! Session::get('thongbao_mau_tt') !!}">
						{!! Session::get('thongbao_tt') !!}
					</div>
				@endif
				@if(Auth::check())
					<p><h4 style="text-align: center; color: #696252"><i class="fa fa-user"></i> Xin chào {{ Auth::User()->name }} !!</h4></p>
				@else
				<div class="login-form">
					<div class="category-title">
						<div class="right-title">
							<h2>Đăng Nhập</h2>
						</div>
						<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
					</div>
					<p></p>
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							<ul style="padding: 0;">
								@foreach($errors->all() as $error)
									<li style="list-style: none;">{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
					@endif
					@if(Session::has('thongbao'))
						<div class="alert alert-{!! Session::get('thongbao_mau') !!}">
							{!! Session::get('thongbao') !!}
						</div>
					@endif
					<div class="login-posts">
						<form action="{!! url('dangnhap', [$chitiet->id, $chitiet->alias]) !!}" method="POST">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
						  	<div class="form-group">
						    	<label for="email" style="">Email:</label>
						    	<input type="text" name="txtUsername" class="form-control" id="email">
						  	</div>
						  	<div class="form-group">
						    	<label for="pwd">Mật Khẩu:</label>
						    	<input type="password" name="txtPassword" class="form-control" id="pwd">
						  	</div>
						  	<button type="submit" class="loginup btn">Đăng Nhập</button>
						  	<a href="{!! url('dangky', [$chitiet->id, $chitiet->alias])  !!}" class="signlgup btn btn-primary">Đăng Ký</a>
						  	<a class="resetps" href="{{ route('password.request') }}">Quên mật khẩu</a>
						</form>
					</div>
				</div>
				@endif
				@include('user.aside')
				<div class="category-new">
					<div class="category-title">
						<div class="right-title">
							<h2>Tin Liên Quan</h2>
						</div>
						<div style="border-bottom: 25px solid #104cf7;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
					</div>
					@foreach($tinlienquan as $tlq)
					<div class="category-content">
						<div class="img-cate">
							<a href="#"><img class="img-responsive" src="{{ url('public/admin/uploads/'.$tlq->image) }}" alt=""></a>
						</div>
						<div class="content-cate">
							<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i>&nbsp{!! date("d/m/Y H:i:m", strtotime($tlq->created_at)) !!}</p>
							<h3>
								<a href="{{ url('chi-tiet-tin', [$tlq->id, $tlq->alias]) }}">{{ $tlq->title }}</a>
							</h3>
						</div>
					</div>
					@endforeach
				</div>
			</aside>
		</div>
	</section>
@endsection