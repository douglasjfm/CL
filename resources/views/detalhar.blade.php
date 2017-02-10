<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>{{ config('app.name', 'Cidade Limpa') }}</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://localhost/assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="http://localhost/assets/css/styles.css" />
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	@if (Auth::guest())
		<script type="text/javascript">
			window.history.go("{{ route('login') }}");
		</script>
	@else
	<nav>
	<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
		<li>
			<a href="#" style="color: black;">
				<strong>{{ Auth::user()->name }}</strong>
			</a>
		</li>
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
		<section>
			<h2>Denuncia: {{$id}}</h2>
			<h2>Tipo: {{$cl}}</h2>
			<h2>Volume: {{$vl}}</h2>
			<h2>Data: {{$ts}}</h2>
			<meta id="coord" name="{{$latlng}}">
			<meta id="imgsrc" name="{{$ilnk}}">
			<table style="width:100%;"><tr><td>
			<div id="map" style="height:250px;width:100%;border:none;">
			<script>
			var map;
			function initMap()
			{
				var latlng = document.getElementById('coord').getAttribute('name');
				var arr = latlng.split(',');
				var dlat = arr[0], dlng = arr[1];
				map = new google.maps.Map(document.getElementById('map'), {
					center: {lat: Number(dlat), lng: Number(dlng)},
					zoom: 17
				});
				var marker = new google.maps.Marker({
					position: {lat: Number(dlat), lng: Number(dlng)},
					map: map,
					title: ''
				});
			}
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqe-_j4Ith91UN-IP3ZF98Atcepzu-rqY&callback=initMap" async defer></script>
			</div>
			</td><td style="width:40%; border: none;">
			<img style="width: 40%, height: auto; margin-top: 10px;" src="http://localhost/originais/{{$ilnk}}"/>
			</td></tr></table>
		</section>
	</section>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://localhost/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://localhost/assets/js/cl.js"></script>
	@endif
</body>
</html>
