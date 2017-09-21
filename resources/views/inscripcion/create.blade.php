@extends('layouts.admin')
@section('contenido')
<?php
    use PJD\Localidad;
    $localidades = Localidad::all();
?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Participante</h3>
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

{!! Form::open(array('url'=>'inscripcion','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="name">Nombre:</label>
      			<input type="name" name="nombre" required class="form-control" value="{{old('nombre')}}" />
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="apellido">Apellido:</label>
      			<input type="name" class="form-control" required name="apellido" value="{{old('apellido')}}" />
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="apellido">Edad:</label>
      			<input type="number" min="15" max="50" class="form-control" name="edad" value="{{ old('edad') }}"/>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="remera">Remera:</label><br />
			    <select name="remera" class="form-control"> 
			          <option value="14" selected>14</option>
			          <option value="P">P</option>
			          <option value="M">M</option>
			          <option value="G">G</option>
			          <option value="XG">XG</option>
			          <option value="XXG">XXG</option>
			    </select>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="image">Permiso de los padres: (Obs: adjuntar foto del permiso)</label>
      			<input type="file" name="fotopermiso" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">Numero Cedula: </label>
      			<input type="name" class="form-control" name="cedula" value="{{ old('cedula') }}">
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="email">Email:</label>
      			<input type="email" name="email" class="form-control" value="{{ old('email')}}">
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="imagen">Foto Perfil:</label>
      			<input type="file" name="foto" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="select">¿A que localidad perteneces?</label>
      			<select name="localidad" class="form-control">
                @foreach($localidades as $localidad):
                    <option value=" {{ $localidad->id }} ">{{$localidad->ciudad_parroquia}}</option>
                @endforeach
        		</select>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label><b>En su comunidad usted es:</b></label><br/>
				<label><input type="checkbox" name="animador" value="a" class="form-control">Animador - </label>
				<label><input type="checkbox" name="miembrocj" checked value="m" class="form-control">Miembro de Comunidad - </label>
				<label><input type="checkbox" name="dinamizador" value="d" class="form-control">Dinamizador</label>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">¿Ya tuviste alguna experiencia en esta actividad?</label><br />
				<label><input type="radio" name="experiencia" value="1" class="form-control">Si - </label>
        		<label><input type="radio" name="experiencia" value="0" checked class="form-control">  No </label>
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