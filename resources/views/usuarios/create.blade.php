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
   <!--Vista del formulario para crear usuarios-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Introducir un Usuario</h1>
		<!--Mostrar si hay más formaciones-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form enctype="multipart/form-data" method="POST" action="{{ route('usuarios.store') }}">
				 @csrf		
							
				<fieldset>
					<div class="form-group">
	                E-mail <input type="text" name="email" required/>
	            	</div>
	            	<div class="form-group">
		                Password: <input type="password" name="password" required/>
		            </div>
		            <div class="form-group">
		                Nombre: <input type="text" name="name" required/>
		            </div>
		            
		            <div class="form-group">
		                Apellidos: <input type="text" name="apellidos" required/>
		            </div>
		            <div class="form-group">
		                Dirección: <input type="text" name="direccion" required/>
		            </div>
		            <div class="form-group">
		                Población: <input type="text" name="poblacion" required/>
		            </div>
		            <div class="form-group">
		                Provincia: <input type="text" name="provincia" required/>
		            </div>
		            <div class="form-group">
		                Código Postal: <input type="text" name="cod_postal" required/>
		            </div>
		            <div class="form-group">
		                Teléfono: <input type="text" name="telefono" required/>
		            </div>
		            <div class="form-group">
		                DNI: <input type="text" name="dni"/>
		            </div>
		            <div class="form-group">
		            	Rol:
						<select name="roles_id" id="roles_id">
							<option value=""></option>
							 @foreach($roles as $rol)
							<option value="{{ $rol->id }}">
        						{{ $rol->nombre }}			
							 @endforeach
						</select>
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