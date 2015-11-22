<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>:.:Pruevas Gravility:.:</title>
		<!-- Bootstrap CSS -->
		{!! Html::style('css/bootstrap.min.css') !!}
		{!! Html::style('css/estilo.css') !!}
	</head>
	<body>


@yield('menu')
@yield('cantenido')

		<!-- jQuery -->
		{!! Html::script('js/jquery.min.js') !!}
		{!! Html::script('js/bootstrap.min.js') !!}
		{!! Html::script('js/app.js') !!}
	</body>
</html>