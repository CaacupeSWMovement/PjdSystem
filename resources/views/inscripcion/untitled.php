<div class="row">
		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="name">Nombre:</label>
      			<input type="name" name="nombre" required class="form-control" value="{{$persona->nombre}}" />
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
      			<input type="file" class="form-control" name="permiso"/>
      				@if($persona->fotopermiso!='nulo')
						<img src="permisos/{{ $persona->fotopermiso }}" class="img-responsive" alt="">
					@else
						Sin permiso
					@endif
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">Numero Cedula: </label>
      			<input type="name" class="form-control" name="cedula" value="{{$persona->cedula}}">
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
				<label><input type="checkbox" name="animador" value="a" class="form-control">Animador - </label>
				<label><input type="checkbox" name="miembrocj" checked value="m" class="form-control">Miembro de Comunidad - </label>
				<label><input type="checkbox" name="dinamizador" value="d" class="form-control">Dinamizador</label>
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">¿Ya tuviste alguna experiencia en esta actividad?</label><br />
				<label>
				@if($persona->experiencia)
					<input type="radio" name="experiencia" value="1" class="form-control" checked>Si - </label>
					<label><input type="radio" name="experiencia" value="0" class="form-control">  No </label>
				@else
					<input type="radio" name="experiencia" value="1" class="form-control">Si - </label>
					<label><input type="radio" name="experiencia" value="0" class="form-control" checked>  No </label>
				@endif
			</div>
		</div>

		<div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
			<div class="form-group">
				<label for="pwd">Zona</label>
				<input type="number" name="zona" min="1" max="15" />
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
			
		