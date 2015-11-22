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
	
</pre>
@stop