<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>{{ config('app.name', 'Cidade Limpa') }}</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav style="height:70px;">
	<div class="navbar-header">
		<!-- Collapsed Hamburger -->
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<!-- Branding Image -->
		<a style="color: black;" class="navbar-brand" href="">
			<strong>{{ config('app.name', 'Laravel') }}</strong>
		</a>
	</div>
	<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
		<li>
			<a href="{{ url('/login') }}" style="color: black;"><strong>Login</strong> </a>
		</li>
		<li>
			<a href="{{ url('/register') }}" style="color: black;"><strong>Register</strong></a>
		</li>
	</ul>
	</nav>
	<section class="container">
		<section style="text-align:center;">
			<h2>Sistema Cidade Limpa</h2>
			<img src="assets/images/logo.png" alt="" style="margin-left: 37%" class="img-responsive" />
			<h2>Soluções em engenharia ambiental</h2>
		</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>