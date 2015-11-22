@extends('gravility.menu')

 @section('cantenido')
<div id="matrix">
		<div class="container">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			{!! Form::open(['route'=>'matrix','method'=>'POST'])!!}
				<div class="form-group">
					{!! Form::label('cubo','Cubo')!!}
					{!!  Form::select('PruebasUnitarias', array('0' => 'Prueba 1', '1' => 'Prueba 2','2' => 'Prueba 3','3' => 'Prueba 4'))!!}
					@if(isset($datos))
					{!! Form::textarea('datos',Input::old('post', $datos),['size' => '17x17','class'=>'form-control',"id"=>"datos"])!!}
					@else
					{!! Form::textarea('datos',null,['size' => '17x17','class'=>'form-control',"id"=>"datos"])!!}
					@endif
				</div>
				{!! Form::submit('Resolver',['class'=>'btn btn-primary',"id"=>"enviar"]) !!}
			{!! Form::close()!!}
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<ul class="nav col-xs-2 col-sm-2 col-md-2 col-lg-2">
					@if(isset($matrix))
						@foreach($matrix as $valor)
							<li>{{$valor}}</li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</div>

	<pre class="pre-scrollable">
Para este ejercicio e implementado el framework laravel en su versión 5.1, con el cual intervienen una clases aplicando a
la arquitectura MVC que es implementada en laravel.

Utilizando el sistema de rutas de laravel, asignando rutas para los métodos post y get  de dicha actividad,  creando una clase controlador llamada MatrixController esta es la encargada de la lógica de negocio en ella encontramos cuatro métodos los cuales son:
->matrix: función Principal recibe los datos y retorna el resultado.
->numeroPruebas: recibe un arreglo con los parámetros de la prueba a recorrer.
->consultas:recibe un arreglo con la cantidad de  consultas a recorrer.
->queryUpdate: evalúa qué tipo de consulta, manipula la base de datos y retorna la respuesta.

</pre>
@stop