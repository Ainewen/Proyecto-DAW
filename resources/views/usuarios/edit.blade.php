@extends('layouts.app')
@section('content')

<div class="container">
	<!--Mensaje de error o success-->
    @if(Session::has('flash_message_error'))
   <div class="alert alert-sm alert-danger alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_error') !!}</strong>
   </div>
   @endif
   
   @if(Session::has('flash_message_success'))
   <div class="alert alert-sm alert-success alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>{!! session('flash_message_success') !!}</strong>
   </div>
   @endif
    <!--Vista del formulario para editar usuario-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Actualizar el usuario {{$usuarios->email}}</h1>
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form method="POST" action="{{ route('usuarios.update', $usuarios->id) }}">
				<input name="_method" type="hidden" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>	
							
				<fieldset>
					<input type="hidden" id="id" name="id" value="{{$usuarios->id}}"/>
					<div class="form-group">
	                E-mail <input type="text" name="email" value="{{$usuarios->email}}" required/>
	            	</div>
	            	<div class="form-group">
		                Password: <input type="password" name="password" value="{{$usuarios->password}}"required/>
		            </div>
		            <div class="form-group">
		                Nombre: <input type="text" name="name" value="{{$usuarios->name}}" required/>
		            </div>
		            
		            <div class="form-group">
		                Apellidos: <input type="text" name="apellidos" value="{{$usuarios->apellidos}}" required/>
		            </div>
		            <div class="form-group">
		                Dirección: <input type="text" name="direccion" value="{{$usuarios->direccion}}" required/>
		            </div>
		            <div class="form-group">
		                Población: <input type="text" name="poblacion" value="{{$usuarios->poblacion}}" required/>
		            </div>
		            <div class="form-group">
		                Provincia: <input type="text" name="provincia" value="{{$usuarios->provincia}}" required/>
		            </div>
		            <div class="form-group">
		                Código Postal: <input type="text" name="cod_postal" value="{{$usuarios->cod_postal}}" required/>
		            </div>
		            <div class="form-group">
		                Teléfono: <input type="text" name="telefono" value="{{$usuarios->telefono}}" required/>
		            </div>
		            <div class="form-group">
		                DNI: <input type="text" name="dni" value="{{$usuarios->dni}}" />
		            </div>
		            <div class="form-group">
		            	Rol:
						<select name="roles_id" id="roles_id">	
							 @foreach($roles as $rol)
							 <option value=""/>
							<option value="{{ $rol->id }}" {{ $rol->id == $usuarios->roles_id ?  : '' }}>{{ $rol->nombre }}</option>	
							 @endforeach
						</select>
						 @if(is_null($usuarios->roles_id))
							<input type="text" name="roles" value="Cliente" readonly/>	
				 		@else
							 <input type="text" name="roles" value="{{$usuarios->role->nombre}}" readonly/>	
						@endif	 				
		            </div>		  
		            <div class="form-group">
		            	<a href="{{ route('usuarios.index') }}" class="btn btn-danger" >ATRÁS</a>
		                <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>            
		            </div>
				</fieldset>			
			</form>
			<br>			
		</div>
	</div>
</div>

@endsection('content')