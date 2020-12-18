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
    <!--Vista del formulario para editar artículo-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Actualización del Artículo {{$articulos->nombre}}</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form enctype="multipart/form-data" method="POST" action="{{ route('articulos.update', $articulos->id) }}"  role="form">
				<input name="_method" type="hidden" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
				
				<fieldset>
				<input type="hidden" id="id" name="id" value="{{$articulos->id}}"/>
					<div class="form-group">
	                	Codigo: <input type="text" name="codigo" value="{{$articulos->codigo}}" required/>
	            	</div>
	            	<div class="form-group">
		                Nombre: <input type="text" name="nombre" value="{{$articulos->nombre}}" required/>
		            </div>
		            <div class="form-group">
		                Precio: <input type="text" name="precio" value="{{$articulos->precio}}" required/>
		            </div>
		            <div class="form-group">
		                Medida: <input type="text" name="medida" value="{{$articulos->medida}}" required/>
		            </div>
		            <div class="form-group">
		            	Categoría:
						<select name="categorias_id" id="categorias_id">	
							 @foreach($categorias as $cat)
							<option value="{{ $cat->id }}" {{ $cat->id == $articulos->categorias_id ? 'selected' : '' }}>{{ $cat->nombre }}</option>	
							 @endforeach
						</select>
							 <input type="text" name="categorias" value="{{$articulos->categoria->nombre}}" readonly/>		
		            </div>		            
		            <div class="form-group">
		                Descripción corta: <input type="text" name="descripcion_corta" value="{{$articulos->descripcion_corta}}" required/>
		            </div>
		            <div class="form-group">
		            	Descripción Larga: <textarea class="summernote" name="descripcion_larga" value="" required>{{$articulos->descripcion_larga}}</textarea>
		            </div>
					<div class="form-group">
		               Destacados: 
		               <input type=radio name="destacados" value="1" {{ $articulos->destacados == '1' ? 'checked' : ''}}>Si</option>
                 			<input type=radio name="destacados" value="0" {{ $articulos->destacados == '0' ? 'checked' : ''}}>No</option> 
		            </div>
		            <div class="form-group">
		                Stock: <input type="number" name="stock" value="{{$articulos->stock}}" required/>
		            </div>
		            <div class="form-group">
		                Slug: <input type="text" name="slug" value="{{$articulos->slug}}" required/>
		            </div>
		            <div class="form-group">
		            <img class="img-thumbnail w-25" src="../../img/articulos/{{$articulos->imagen1}}"/>	
			            Imagen 1: <input name="imagen1" type="file"/>
			        </div>
		            <div class="form-group">
		            	<a href="{{ route('articulos.index') }}" class="btn btn-danger" >ATRÁS</a>
		                <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>		                
		            </div>
				</fieldset>			
			</form>
			<br>
		</div>
	</div>
</div>
@endsection('content')			