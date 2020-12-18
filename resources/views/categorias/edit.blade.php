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
    <!--Vista del formulario para editar categoría-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Actualización de
			la Categoría {{$categorias->nombre}}</h1>
		<!--Mostrar si hay más formaciones-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form enctype="multipart/form-data" method="POST" action="{{ route('categorias.update', $categorias->id) }}"  role="form">
				<input name="_method" type="hidden" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
				
				<fieldset>
				<input type="hidden" id="id" name="id" value="{{$categorias->id}}"/>
	            	<div class="form-group">
		                Nombre: <input type="text" name="nombre" value="{{$categorias->nombre}}" required/>
		            </div>           
		            <div class="form-group">
		            <img class="img-thumbnail w-25" src="../../img/categorias/{{$categorias->imagen}}"/>	
			            Imagen: <input name="imagen" type="file"/>
			        </div>
			        <div class="form-group">
		                Slug: <input type="text" name="slug" value="{{$categorias->slug}}" required/>
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