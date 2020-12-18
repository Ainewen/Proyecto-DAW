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
    <!--Vista del la tabla con el listado de usuarios-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Listado de Usuarios</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<h3>Selecciona si quieres añadir un nuevo usuario, editar o borrar uno existente.</h3>
				<div class="pull-right">
           			 <div class="btn-group float-right mb-3">
           			 	<a href="{{ route('usuarios.create') }}" class="btn btn-info" >Añadir Nuevo</a>
            		</div>
          		</div>
    			
				<table id="tabla" class="table table-dark w-100">
				  <thead>
					<tr>						
					  <th>E-mail</th>
					  <th>Nombre</th>
					  <th>Apellidos</th>
					  <th>Población</th>
					  <th>Código Postal</th>
					  <th>Teléfono</th>
					  <th>Rol</th>
					  <th>Ver Pedidos</th>
					  <th>Opciones</th>
					</tr>
				  </thead>
				  <tbody>
				 @foreach($usuarios as $usu)
					<input type="hidden" id="id" name="id" value="{{$usu->id}}"/>
					<th scope="row">{{$usu->email}}</th>	
					<th scope="row">{{$usu->name}}</th>
					<th scope="row">
					{{$usu->apellidos}}	
					</th>					
 				  	<th scope="row">
					{{$usu->poblacion}}</th>
					<th scope="row">{{$usu->cod_postal}}</th>
				 	<th scope="row">
					{{$usu->telefono}}</th>
				 	<th scope="row">
					@if(is_null($usu->roles_id))
						Cliente
				 	@else
						{{$usu->role->nombre}}
					@endif
					</th>
					<th scope="row">
				 	<a class="d-inline btn btn-info btn-sm" href="{{route('pedidos.usuarios-pedidos', $usu->id)}}">Pedidos</a></th>	
				 	<td class="btn-group"><a class="d-inline btn btn-info btn-sm" href="{{route('usuarios.edit', $usu->id)}}">Editar</a>
				 	<form method="post" action="{{ route('usuarios.destroy',$usu->id) }}"  role="form">
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