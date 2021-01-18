<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Abdrashov Zamanbek, abdrashovv@gmail.com">
	<meta name="reply-to" content="abdrashovv@gmail.com">
	<title>@yield('title') {{ config('app.name') }} Админка</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}"> 

	<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

	<style>
      .bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
      }

      @media (min-width: 768px) {
        	.bd-placeholder-img-lg {
          	font-size: 3.5rem;
        	}
      }
 	</style>
	<!-- Custom styles for this template -->
	<link href="{{ asset('assets/dashboard.css') }}" rel="stylesheet">
</head>
<body>
	@include('admin.include.header')

	<div class="container-fluid">
		<div class="row">
			@include('admin.include.menu')
			@yield('content')
		</div>
		<br><br><br>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery.slim.min.js') }}"><\/script>')</script><script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="{{ asset('assets/dashboard.js') }}"></script>
</body>
</html>