<!DOCTYPE html>
<html>
<head>
	<title>Sebo Linha</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style>
		.title {
			text-align: center;
			font-weight: 300;
			font-size: 54px;
			font-family: 'Open Sans';
		}
		.navbar-fixed-top{ top:5em; }
	</style>
</head>
<body>
	<div>
		<div class="title" style="position: relative; width: 100%; z-index:1; position:fixed; top: 0px; background-color: white;">Sebo Linha</div>
		<div class="row">
			@include('menus.menutopo')
		</div>
		<div class="container-fluid" style="margin-top:9em;">
			<div class="row">
				<div class="col-sm-2">
					@include ('menus.menulado')
				</div>
				<div class = "col-sm-9">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>