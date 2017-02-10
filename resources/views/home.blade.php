<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>{{ config('app.name', 'Cidade Limpa') }}</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="tabela()">
	@if (Auth::guest())
		<script type="text/javascript">
			window.history.go("{{ route('login') }}");
		</script>
	@else
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
		<a href="#" class="navbar-brand" style="color: black;">
				{{ Auth::user()->name }}
			</a>
	</div>
	<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
		<!--<li>
			<a href="/mapa" style="color: black;">
				<strong>Mapa</strong>
			</a>
		</li>-->
		<li>
			<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
						 document.getElementById('logout-form').submit();" style="color: black;">
				<strong>Logout</strong>
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</li>
	</ul>
	</nav>
	<section class="container">
	<div style="text-align: center;">
		<button onclick="plotmap()">Mapa</button>
	</div>
		<section style="margin-top: -60px;">
			<table style="margin-top: 8%;">
				<tbody id="tab">
				<tr>
					<td>Cod</td>
					<td>Data</td>
					<td>Classe</td>
					<td>Volume</td>
					<td>Imagem</td>
					<td>Endereço</td>
					<td>Usuário</td>
					<td>Detalhar</td>
					<td>status</td>
					<td>GOF</td>
					<td>Enviar</td>
				</tr>
				</tbody>
			</table>
		</section>
	</section>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/cl.js"></script>
	@endif
</body>
</html>
