<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{!! url('public/user/css/style.css') !!}">
	<link rel="stylesheet" href="{!! url('public/user/css/animate.css') !!}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet"> 
	<title>@yield('title')</title>
</head>
<body>
	<header class="header-page">
		<div class="logo">LOGO</div>
		<div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
    	<!-- BEGIN CONTACT -->
    	<div class="sidebar-contact">
			<div class="toggle"></div>
			<h2>Liên Hệ Chúng Tôi</h2>
			<form action="" method="POST">
				<input id="token" type="hidden" name="_token" value="{!! csrf_token() !!}" />
				<input type="text" name="name" id="name" placeholder ="Tên Người Gửi">
				<input type="email" name="email" id="email" placeholder ="Email">
				<input type="rel" name="phone" id="phone" placeholder ="Số Điện Thoại">
				<textarea name="content" id="content" placeholder="Nội Dung"></textarea>
			</form>
			<input id="sendMail" type="submit" name="sendMail" value="Gửi">
		</div>
		<!-- END CONTACT -->
		<nav>
			<ul>
				<li><a href="{{ url('/') }}">Trang Chủ</a></li>
				<?php
			    	$menu_level_1 = DB::table('type_news')->where('type_news_id',0)->get();
			    ?>
			    @foreach($menu_level_1 as $item_level_1)
				<li class="sub-menu"><a href="{!! url('tong-hop',[$item_level_1->id,$item_level_1->alias]) !!}">{!! $item_level_1->name !!}</a>
					<ul>
						<?php
			              	$menu_level_2 = DB::table('type_news')->where('type_news_id',$item_level_1->id)->get();
			            ?>
			            @foreach($menu_level_2 as $item_level_2)
						<li><a href="{!! url('loai-tin',[$item_level_2->id,$item_level_2->alias]) !!}">{!! $item_level_2->name !!}</a></li>
						@endforeach
					</ul>
				</li>
				@endforeach
			</ul>
		</nav>
	</header>
	@yield('noidung')
	<footer>
		<section id="page_info">
			<div class="wrapper">
				<!-- Begin Copyright -->
				<div class="copyright">@ Copyright 2019 by <a href="#">Tiểu Luận</a></div>
				<!-- End Copyright -->
				<!-- Begin Social -->
				<div class="social">
					<a href="javascript:void(0)">
						<img src="{{ asset('public/user/img/icon/facebook.png') }}" alt="Some alt text" width="25">
					</a>
					<a href="javascript:void(0)">
						<img src="{{ asset('public/user/img/icon/youtube.png') }}" alt="Some alt text" width="25">
					</a>
					<a href="javascript:void(0)">
						<img src="{{ asset('public/user/img/icon/twitter.png') }}" alt="Some alt text" width="25">
					</a>
					<a href="javascript:void(0)">
						<img src="{{ asset('public/user/img/icon/instagram.png') }}" alt="Some alt text" width="25">
					</a>
				</div>
			</div>
		</section>
		<div id='bttop'><i class="fa fa-arrow-circle-up"></i></div>
	</footer>
	<script src="{!! url('public/user/js/jquery-3.3.1.min.js') !!}"></script>
	<script src="{!! url('public/user/js/myjs.js') !!}"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.menu-toggle').click(function(){
				$('nav').toggleClass('active')
			})
			$('nav ul li').hover(function(){
				$(this).siblings().removeClass('active');
				$(this).toggleClass('active');
			})
		})
	</script>
	<script>
		$(document).ready(function()
		{
			$('.toggle').click(function(){
				$('.sidebar-contact').toggleClass('active')
				$('.toggle').toggleClass('active')
			})
		})
	</script>

	<!-- Back To Top -->
	<script>
		$(function() {
			$(window).scroll(function() {
				// kéo xuống khoảng cách 0px thì xuất hiện nút Top-up
				if ($(this).scrollTop() != 0) {
					$('#bttop').fadeIn();
				}else {
					$('#bttop').fadeOut();
				}
			});
			$('#bttop').click(function() {
				$('body,html').animate({
					scrollTop: 0
				}, 800);
			});
		});
	</script>
	<!-- End Back To Top -->
	{{-- Tìm Kiếm --}}
	<script>
		$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: "{{ url('timkiem/tieude?value=%QUERY%') }}",
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });


    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'news-title',
            display: function(data) {
                return data.title;
            },
            templates: {
                empty: [
                    '<div class="header-search">Tiêu Đề</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không có dữ liệu.</div></div>'
                ],
                header: [
                    '<div class="header-title">Tiêu Đề</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="{{ url('tintuc') }}'+ "/" +''+ data.id + ' " class="list-group-item">' + data.title + '</a>';
                }
            }
        }
    ]);
});
// End Tìm Kiếm
</script>
</body>
</html>