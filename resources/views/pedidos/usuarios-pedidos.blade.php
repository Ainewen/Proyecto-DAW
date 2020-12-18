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
   <!--Vista del la tabla con los pedidos del usuario seleccionado en el listado de usuarios-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Listado de Pedidos del usuario {{ $usuarios->email }}</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
				<div class="pull-right">
           			 <div class="btn-group float-right mb-3 mt-3">
           			 	<a href="{{ route('usuarios.index') }}" class="btn btn-info"> Volver Atrás</a>
            		</div>
          		</div>
    			
				<table id="tabla" class="table table-dark w-100">
				  <thead>
					<tr>						
					  <th>Número Pedido</th>
					  <th>Total</th>
					  <th>Fecha</th>
					  <th>Forma de Pago</th>
					  <th>Gastos de envío</th>
					  <th>Estado</th>
					  <th>Detalle Pedidos</th>
					</tr>
				  </thead>
				  <tbody>				  	
				 @foreach($usuariospedidos as $uspe)
				 <tr>
					<input type="hidden" id="id" name="id" value="{{$uspe->id}}"/>
					<th scope="row">{{$uspe->id}}</th>
					<th scope="row">{{$uspe->total}}</th>
					<th scope="row">{{$uspe->fecha}}</th>
					<th scope="row">
					{{$uspe->forma_pago->nombre}}	
					</th>					
 				  	@if(is_null($uspe->gastos_envio))
						<th>No</th>
				 	@else
						<th>{{$uspe->gastos_envio}} €</th>
					@endif
				 	<th scope="row">				 		
				 	{{$uspe->estado->nombre ?? 'Sin estado asignado'}}</th>
				 	<td scope="row">		 		
				 	<a class="d-inline btn btn-info btn-sm" href="{{route('pedidos.usuarios-detalle-ped', $uspe->id)}}">Ver</a></td> 	 	
				 </tr>
				 </form>
				 @endforeach			
            	</tbody>
			</table>
		</div>
	</div>		
</div>

@endsection('content')