@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Participantes <a href="inscripcion/create"><button class="btn btn-primary">Nuevo</button></a></h3><br/>
			@include('inscripcion.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Edad</th>
						<th>Remera</th>
						<th>Cedula</th>
						<th>Email</th>
						<th>Parroquia</th>
						<th>Zona</th>
						<th>Animador</th>
						<th>Miembro<br> Comunidad</th>
						<th>Dinamizador</th>
						<th>Experiencia</th>
						<th>Foto</th>
						<th>Permiso</th>
						<th>Opciones</th>
					</thead>
					@foreach($personas as $persona)
					<tr>
						<td>{{$persona->id}}</td>
						<td>{{$persona->nombre}}</td> 
						<td>{{$persona->apellido}}</td>
						<td>{{$persona->edad}}</td>
						<td>{{$persona->remera}}</td>
						<td>{{$persona->cedula}}</td>
						<td>{{$persona->email}}</td>
						<td>{{$persona->parroquia}}</td>
						<td>{{$persona->zona}}</td>
						<td>@if($persona->animador)
								Si
							@else
								No
							@endif
							</td>
						<td>@if($persona->miembrocj)
								Si
							@else
								No
							@endif
							</td>
						<td>@if($persona->dinamizador)
								Si
							@else
								No
							@endif
							</td>
						<td>@if($persona->experiencia)
								Si
							@else
								No
							@endif
							</td>
						<td>
							<img src="imagenes/{{ $persona->foto }}" class="img-responsive" alt="">
						</td>
						<td>
							@if($persona->fotopermiso!='nulo')
								<img src="permisos/{{ $persona->fotopermiso }}" class="img-responsive" alt="">
							@else
								Sin permiso
							@endif
						</td>
						<td>
							<a href="{{URL::action('PersonaController@edit',$persona->id)}}"><button class="btn btn-info">Editar</button></a>
							<!-- <a href="" data-target="#modal-delete-{{$persona->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>-->
						</td>
					</tr>
					@include('inscripcion.modal')
					@endforeach
				</table>
			</div>
			{{$personas->render()}}
		</div>
	</div>
@endsection