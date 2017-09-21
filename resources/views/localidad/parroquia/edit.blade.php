@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Parroquía: {{ $localidad->ciudad_parroquia }}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>
							{{$error}}
						</li>
					@endforeach
				</ul>
			</div>
			@endif

{!! Form::model($localidad,['method'=>'PATCH','route'=>['parroquia.update',$localidad->id]]) !!}
			{{Form::token()}}
			<div class="form-group">
				<input type="text" name="ciudad_parroquia" class="form-control" value="{{$localidad->ciudad_parroquia}}" placeholder="Parroquia" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			
			{!!Form::close()!!}
		</div>
	</div>
@endsection