<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Librarian</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/flags.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	@yield('head')

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Librarian</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ route('index') }}">{{ trans('messages.menu.home') }}</a></li>
					<li><a href="{{ route('authors.index') }}">{{ trans('messages.menu.autores') }}</a></li>
					<li><a href="{{ route('books.index') }}">{{ trans('messages.menu.livros') }}</a></li>
					<li><a href="{{ route('books.categorias') }}">{{ trans('messages.menu.categorias') }}</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="flag {{ trans('messages.idioma.sigla') }}"></i>{{ trans('messages.idioma.nome') }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('set.locale',['locale' => 'pt-BR']) }}"><i class="flag br"></i>{{ trans('messages.idiomas.br') }}</a></li>
							<li><a href="{{ route('set.locale',['locale' => 'es']) }}"><i class="flag es"></i>{{ trans('messages.idiomas.es') }}</a></li>
							<li><a href="{{ route('set.locale',['locale' => 'en']) }}"><i class="flag us"></i>{{ trans('messages.idiomas.en') }}</a></li>
						</ul>
					</li>

					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">{{ trans('messages.menu.login') }}</a></li>
						<li><a href="{{ url('/auth/register') }}">{{ trans('messages.menu.cadastro') }}</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">{{ trans('messages.menu.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
