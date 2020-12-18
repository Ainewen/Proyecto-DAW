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
   <!--Vista del formulario para crear categoría-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Introducir una Categoría</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form enctype="multipart/form-data" method="POST" action="{{ route('categorias.store') }}">
				 @csrf		
							
				<fieldset>
	            	<div class="form-group">
		                Nombre: <input type="text" name="nombre" required/>
		            </div>
		             <div class="form-group">           	
			            Imagen: <input name="imagen" type="file" required/>
			        </div>
		            <div class="form-group">
		                Slug: <input type="text" name="slug" required/>
		            </div>
		            <div class="form-group">
		            	<a href="{{ route('categorias.index') }}" class="btn btn-danger" >ATRÁS</a>
		                <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>               
		            </div>
				</fieldset>			
			</form>
			<br>			
		</div>
	</div>
</div>

@endsection('content')