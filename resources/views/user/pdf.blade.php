<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{!! url('public/user/css/style.css') !!}">
	<link rel="stylesheet" href="{!! url('public/user/css/animate.css') !!}">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body{
			font-family: 'Roboto', sans-serif;
		}
	</style>
</head>
<htmlpageheader name="page-header">
	Your Header Content
</htmlpageheader>
<body>
	<htmlpageheader name="page-header">
		Your Header Content
	</htmlpageheader>
	<header class="title-posts">
		<h1>{!! $data->title !!}</h1>
		<p class="content-time" style="margin-top: 10px; padding-bottom: 0"><i class="fa fa-clock-o"></i> {!! date("d/m/Y H:i:m", strtotime($data->created_at)) !!}  <i class="fa fa-eye"> {!! $data->views !!} lượt xem</i></p>
	</header>
	<section class="content-posts">
		<p>{!! $data->content !!}</p>
	</section>
</body>
<script src="{!! url('public/user/js/jquery-3.3.1.min.js') !!}"></script>
<script src="{!! url('public/user/js/myjs.js') !!}"></script>
</html>