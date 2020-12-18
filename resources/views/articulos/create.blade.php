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

    <!--Vista del formulario para crear artículo-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Introducir un Artículo</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form enctype="multipart/form-data" method="POST" action="{{ route('articulos.store') }}">
				 @csrf		
							
				<fieldset>
					<div class="form-group">
	                	Codigo: <input type="text" name="codigo" required/>
	            	</div>
	            	<div class="form-group">
		                Nombre: <input type="text" name="nombre" required/>
		            </div>
		            <div class="form-group">
	                	Precio: <input type="text" name="precio" required/>
	            	</div>
	            	<div class="form-group">
	                	Medida: <input type="text" name="medida" required/>
	            	</div>
		            <div class="form-group">
		            	Categoría:
						<select name="categorias_id" id="categorias_id" required>
							<option value=""></option>
							 @foreach($categorias as $cat)
							<option value="{{ $cat->id }}">
        						{{ $cat->nombre }}			
							 @endforeach
						</select>
		            </div>
		            <div class="form-group">
		                Descripción corta: <input type="text" name="descripcion_corta" required/>
		            </div>
		            <div class="form-group">
		            	Descripción Larga: <textarea class="summernote" placeholder="Introduce la descripción larga" name="descripcion_larga" required></textarea>
		            </div>
		            <div class="form-group">
		               Destacados: Sí: 
		                <input name="destacados" type="radio" value="1"/>
		                No: 
		                <input name="destacados" type="radio" value="0"/>
		            </div>
		            <div class="form-group">
	                	Stock <input type="number" name="stock" required/>
	            	</div>
		            <div class="form-group">
		                Slug: <input type="text" name="slug" required/>
		            </div>
		            <div class="form-group">           	
			            Imagen 1: <input name="imagen1" type="file" required/>
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