<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Market</title>
<script src="{{ asset('js/jQuery-2.1.4.min.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ripples.min.css') }}">
</head>
<body>
	@include('templates.partials.header')
	<div class="container">
		@include('templates.partials.alert')
		@yield('content')
	</div>
	@include('templates.partials.footer');
</body>
</html>