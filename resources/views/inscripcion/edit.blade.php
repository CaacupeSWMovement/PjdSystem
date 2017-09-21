@extends('layouts.admin')
@section('contenido')
<?php
    use PJD\Localidad;
    $localidades = Localidad::all();
?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Participante: {{ $persona->nombre }}</h3>
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
		</div>
	</div>

{!! Form::model($persona,['method'=>'PATCH','route'=>['inscripcion.update',$persona->id]]) !!}
			{{Form::token()}}
			<div class="row">
		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="name">Nombre:</label>
      			<input type="name" name="nombre" required class="form-control" value="{{$persona->nombre}}" readonly/>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="apellido">Apellido:</label>
      			<input type="name" class="form-control" required name="apellido" value="{{$persona->apellido}}" />
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="apellido">Edad:</label>
      			<input type="number" min="15" max="50" class="form-control" name="edad" value="{{$persona->edad}}"/>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="remera">Remera:</label><br />
			    <input type="name" class="form-control" required name="remera" value="{{$persona->remera}}" />
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="image">Permiso de los padres: (Obs: adjuntar foto del permiso)</label><br />
      				@if($persona->fotopermiso!='nulo')
						<img src="{{asset('permisos/'.$persona->fotopermiso)}}" height="300px" width="300px" class="img-responsive" alt="">
					@else
						Sin permiso
					@endif
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="image">Foto Perfil:</label>
      				<img src="{{asset('imagenes/'.$persona->foto )}}" height="300px" width="300px" class="img-responsive" alt="">
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="email">Email:</label>
      			<input type="email" name="email" class="form-control" value="{{$persona->email}}">
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="select">¿A que localidad perteneces?</label>
      			<select name="localidad" class="form-control">
                @foreach($localidades as $localidad)
                	@if ($localidad->id==$persona->localidads_id)
                    	<option value=" {{ $localidad->id }} " selected>{{$localidad->ciudad_parroquia}}</option>
					@else
						<option value=" {{ $localidad->id }} ">{{$localidad->ciudad_parroquia}}</option>
					@endif
                @endforeach
        		</select>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label><b>En su comunidad usted es:</b></label><br/>
				<label>@if($persona->animador)
								<input type="checkbox" name="animador" value="a" checked class="form-control">Animador - 
							@else
								<input type="checkbox" name="animador" value="a" class="form-control">Animador - 
							@endif
				</label>
				<label>@if($persona->miembrocj)
								<input type="checkbox" name="miembrocj" checked value="m" class="form-control">Miembro de Comunidad - 
							@else
								<input type="checkbox" name="miembrocj" value="m" class="form-control">Miembro de Comunidad - 
							@endif
				</label>
				<label>@if($persona->dinamizador)
								<input type="checkbox" name="dinamizador" value="d" class="form-control" checked>Dinamizador
							@else
								<input type="checkbox" name="dinamizador" value="d" class="form-control" checked>Dinamizador
							@endif
				</label>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">¿Ya tuviste alguna experiencia en esta actividad?</label><br />
				<label><input type="radio" name="experiencia" value="1" class="form-control">Si - </label>
        		<label><input type="radio" name="experiencia" value="0" checked class="form-control">  No </label>
			</div>
		</div>
		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">Zona</label>
				<input type="number" min="1" max="15" class="form-control" name="zona" value="{{$persona->zona}}"/>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
					<center><button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button></center>
			</div>
		</div>
			
			{!!Form::close()!!}
			
@endsection