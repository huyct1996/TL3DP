<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('public/admin/css/admin-style.css') }}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	{{-- thong ke --}}
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<title>Giao diện Admin</title>
</head>
<body>
	<header class="header-admin">
		<div class="logo">ADMIN</div>
		<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
		<div class="welcome-admin">
			@if(Auth::check())
			<div class="dropdown">
			    <a class="dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::User()->name }}</a>
			    <span class="caret"></span></button>
			    <ul class="dropdown-menu menu-admin">
			      <li><a href="{{ URL::route('admin.nguoidung.getSua', Auth::User()->id ) }}">Thông Tin</a></li>
			      <li><a href="{{ URL::route('admin.Dangxuat') }}">Thoát</a></li>
			    </ul>
			 </div>
			 @endif
		</div>
		<!-- Nav Menu -->
		<div class="nav-menu">
			<ul>
				<li class="dashboard"><a href="{!! URL::route('admin.getThongke') !!}"><i class="fa fa-home"></i>Dashboard</a></li>
				<li class="sub-menu {{Request::segment(2) == 'theloai' ? 'active' : null}}"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Thể loại</a>
					<ul>
						<li><a href="{!! URL::route('admin.theloai.danhsach') !!}"><i class="fa fa-angle-double-right"></i>Danh sách thể loại</a></li>
						<li><a href="{!! URL::route('admin.theloai.getThem') !!}"><i class="fa fa-angle-double-right"></i>Thêm thể loại</a></li>
					</ul>
				</li>
				<li class="sub-menu {{Request::segment(2) == 'tintuc' ? 'active' : null}}"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Tin tức</a>
					<ul>
						<li><a href="{!! URL::route('admin.tintuc.danhsach') !!}"><i class="fa fa-angle-double-right"></i>Danh sách tin tức</a></li>
						<li><a href="{!! URL::route('admin.tintuc.getThem') !!}"><i class="fa fa-angle-double-right"></i>Thêm tin tức</a></li>
					</ul>
				</li>
				<li class="sub-menu {{Request::segment(2) == 'nguoidung' ? 'active' : null}}"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Người dùng</a>
					<ul>
						<li><a href="{!! URL::route('admin.nguoidung.danhsach') !!}"><i class="fa fa-angle-double-right"></i>Danh sách người dùng</a></li>
						<li><a href="{!! URL::route('admin.nguoidung.getThem') !!}"><i class="fa fa-angle-double-right"></i>Thêm người dùng</a></li>
					</ul>
				</li>
			</ul>
		</div>
    	<!-- END Nav Menu -->
	</header>
	<section class="content">
		<div class="container-fluid content-fuild">
				<div class="title-content">
					<h2>@yield('tieude')</h2>
				</div>
				<div class="border-content"></div>
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul style="padding: 0;">
							@foreach($errors->all() as $error)
								<li style="list-style: none;">{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				@endif
			@yield('noidung')
		</div>
	</section>
<script src="{{ url('public/admin/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('public/admin/js/admin-style.js') }}"></script>
<script src="{{ url('public/admin/js/embed.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="{{ url('public/admin/js/ckfinder/ckfinder.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector('#editor'), {
            ckfinder: {
            },
            toolbar: [ 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
        } )
        .catch( function( error ) {
            console.error( error );
        } );
        // Content
        ClassicEditor
        .create( document.querySelector('#editorND'), {
            ckfinder: {
                uploadUrl: 'http://localhost/TL3/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
            },
            toolbar: [ 
            	'ckfinder', '|', 'bulletedList', 'numberedList', '|', 'heading', '|', 'bold', 'italic', '|', 'link' , 'insertTable', 'mediaEmbed', '|', 'undo', 'redo'
            		],
            table: {
	            contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
	        },
	        alignment: {
				options: [ 'left', 'right' ]
			},
			mediaEmbed: {
	            previewsInData: true,
			}
        } )
        .catch( function( error ) {
            console.error( error );
        } );
</script>
</body>
</html>
