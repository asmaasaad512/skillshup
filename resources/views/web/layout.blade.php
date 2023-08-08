<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
     @yield('styles')
    
</head>
<body>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title> @yield('title')</title>
        

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		@yield('styles')
		<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>
	
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="web/index.blade.php">
							<img src="{{asset('img/logo.png')}}" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<x-navbar></x-navbar>
			</div>
		</header>
		<!-- /Header -->
       
@yield('content')
 


	<!-- Footer -->
	<footer id="footer" class="section">

<!-- container -->
<div class="container">

	<!-- row -->
	<div id="bottom-footer" class="row">

		<!-- social -->
		<div class="col-md-4 col-md-push-8">
		 <x-social-linkes></x-social-linkes> 
		</div>
		<!-- /social -->

		<!-- copyright -->
		<div class="col-md-8 col-md-pull-4">
			<div class="footer-copyright">
				<span>&copy; Copyright 2021. All Rights Reserved. | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">SkillsHub</a></span>
			</div>
		</div>
		<!-- /copyright -->

	</div>
	<!-- row -->

</div>
<!-- /container -->

</footer>
<!-- /Footer -->

<!-- preloader -->
<div id='preloader'><div class='preloader'></div></div>
<!-- /preloader -->
<!-- jQuery Plugins -->

<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
		<script type="text/javascript" src='{{asset("js/bootstrap.min.js")}}'></script>
		<script type="text/javascript" src='{{asset("js/main.js")}}'></script>
		<script>
	 		   $('#logOut-link').click(function(e){
               e.preventDefault;
	     $('#logOut-form').submit();
		})
		</script>
		@yield('scripts')
	</body>
</html>
 