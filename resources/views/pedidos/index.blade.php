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
   <!--Vista del la tabla con el listado de pedidos-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Listado de Pedidos</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<h3>Selecciona el pedido que quieres editar.</h3>
				<!--<div class="pull-right">
           			 <div class="btn-group float-right mb-3">
           			 	<a href="{{ route('pedidos.create') }}" class="btn btn-info" >Añadir Nuevo</a>
            		</div>
          		</div>-->
    			
				<table id="tabla" class="table table-dark w-100">
				  <thead>
					<tr>						
					  <th>Número Pedido</th>
					  <th>Usuario</th>
					  <th>Total</th>
					  <th>Fecha</th>
					  <th>Forma de Pago</th>
					  <th>Gastos de envío</th>
					  <th>Estado</th>
					  <!---<th>Línea Pedidos</th>-->
					  <th>Opciones</th>
					</tr>
				  </thead>
				  <tbody>				  	
				 @foreach($pedidos as $pedi)
					<input type="hidden" id="id" name="id" value="{{$pedi->id}}"/>
					<th scope="row">{{$pedi->id}}</th>
					<th scope="row">{{$pedi->user->email}}</th>	
					<th scope="row">{{$pedi->total}}</th>
					<th scope="row">{{$pedi->fecha}}</th>
					<th scope="row">
					{{$pedi->forma_pago->nombre}}	
					</th>					
 				  	@if(is_null($pedi->gastos_envio))
						<td>No</td>
				 	@else
						<td>{{$pedi->gastos_envio}} €</td>
					@endif
				 	<th scope="row">{{$pedi->estado->nombre}}</th>
				 	<!--<th scope="row">
				 	<a class="d-inline btn btn-info btn-sm" href="{{route('pedidos.addDetalle', $pedi->id)}}">Agregar</a></th>-->
				 	<td class="btn-group"><a class="d-inline btn btn-info btn-sm" href="{{route('pedidos.edit', $pedi->id)}}">Editar</a>
				 	</td></tr>
				 </form>
				 @endforeach			
            	</tbody>
			</table>
		</div>
	</div>		
</div>

@endsection('content')