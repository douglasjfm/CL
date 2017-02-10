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
	<section class="container login-form">
		<section>
			<form method="post" action="{{ route('login') }}" role="login">
                        {{ csrf_field() }}
				<img src="assets/images/logo.png" alt="" class="img-responsive" />
			
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<input type="email" name="email" value="{{ old('email') }}" required class="form-control" placeholder="Digite seu email"  autofocus/>
					<span class="glyphicon glyphicon-user"></span>
				</div>
				
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<input type="password" name="password" required class="form-control" placeholder="Digite sua senha" />
					<span class="glyphicon glyphicon-lock"></span>
				</div>
				
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
				<div class="form-group">
					<div class="checkbox" style="text-align: left;">
						<label>
							Lembrar-me <input style="margin-left: 5px; height: 0.9em; position: unset; opacity: 0.5;" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
						</label>
					</div>
				</div>
				<button type="submit" name="go" class="btn btn-primary btn-block">Entrar</button>
				
				<a href="{{ route('password.request') }}">Esqueci minha senha</a> ou <a href="{{ route('register') }}">Criar conta</a>
			</form>
		</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>