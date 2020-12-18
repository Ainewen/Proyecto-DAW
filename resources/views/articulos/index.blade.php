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
    <!--Vista del la tabla con el listado de artículos-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Listado de Artículos</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<h3>Selecciona si quieres añadir un nuevo artículo, editar o borrar uno existente.</h3>
			<h3>Para agregar nuevos atributos a los productos o ver los existentes, pulsa Agregar.</h3>
				<div class="pull-right">
           			 <div class="btn-group float-right mb-3">
           			 	<a href="{{ route('articulos.create') }}" class="btn btn-info" >Añadir Nuevo</a>
            		</div>
          		</div>
    		<!--La opción de atributos la dejo para que se vea la implementación, pero de momento no se va a usar-->	
				<table id="tabla" class="table table-dark w-100">
				  <thead>
					<tr>						
					  <th>Código</th>
					  <th>Nombre</th>
					  <th>Precio</th>
					  <th>Medida</th>
					  <th>Categoría</th>
					  <th>Destacados</th>
					  <th>Stock</th>
					  <th>Slug</th>
					  <th>Imagen1</th>
					  <th>Atributos</th>
					  <th>Opciones</th>
					</tr>
				  </thead>
				  <tbody>
				 @foreach($articulos as $artic)
					<input type="hidden" id="id" name="id" value="{{$artic->id}}"/>
					<th scope="row">{{$artic->codigo}}</th>	
					<th scope="row">{{$artic->nombre}}</th>
					<th scope="row">{{$artic->precio}}€</th>
					<th scope="row">{{$artic->medida}}</th>
					<th scope="row">
					{{$artic->categoria->nombre}}	
					</th>					
 				  	@if($artic->destacados == 1)
						<td>Si</td>
				 	@else
						<td>No</td>
					@endif
					<th scope="row">{{$artic->stock}}</th>
					<th scope="row">{{$artic->slug}}</th>
				 	<th scope="row"><img class="img-thumbnail w-75" src="img/articulos/{{$artic->imagen1}}"/></th>
				 	<th scope="row">
				 		<!--Enlace para agregar atributos al artículo-->
				 	<a class="d-inline btn btn-info btn-sm" href="{{route('articulos.addAtributos', $artic->id)}}">Agregar</a></th>	
				 	<td class="btn-group"><a class="d-inline btn btn-info btn-sm" href="{{route('articulos.edit', $artic->id)}}">Editar</a>
				 	<form method="post" action="{{ route('articulos.destroy',$artic->id) }}"  role="form">
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