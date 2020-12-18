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
   <!--Vista del la tabla con el listado de categorías-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Listado de Categorías</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<h3>Selecciona si quieres añadir una nueva categoría, editar o borrar una existente.</h3>
				<div class="pull-right">
           			 <div class="btn-group float-right mb-3">
           			 	<a href="{{ route('categorias.create') }}" class="btn btn-info" >Añadir Nueva</a>
            		</div>
          		</div>
    			
				<table id="tabla" class="table table-dark w-100">
				  <thead>
					<tr>						
					  <th>Nombre</th>
					  <th>Imagen</th>
					  <th>Slug</th>
					   <th>Opciones</th>	  
					</tr>
				  </thead>
				  <tbody>
				 @foreach($categorias as $cat)
					<input type="hidden" id="id" name="id" value="{{$cat->id}}"/>
					<th scope="row">{{$cat->nombre}}</th>
					<th scope="row"><img class="img-thumbnail w-25" src="img/categorias/{{$cat->imagen}}"/></th>
					<th scope="row">{{$cat->slug}}</th>	 	
				 	<td class="btn-group"><a class="d-inline btn btn-info btn-sm" href="{{route('categorias.edit', $cat->id)}}">Editar</a>
				 	<form method="post" action="{{ route('categorias.destroy',$cat->id) }}"  role="form">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
					<button type="submit" value="Borrar" class="btn btn-danger btn-sm" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">Borrar</button></td></tr>
				 </form>
				 @endforeach			
            	</tbody>
			</table>
		</div>
	</div>		
</div>

@endsection('content')