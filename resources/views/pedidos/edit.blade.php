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
    <!--Vista del formulario para editar un pedido-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Actualización del Pedido número {{$pedidos->id}}</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form method="POST" action="{{ route('pedidos.update', $pedidos->id) }}"  role="form">
				<input name="_method" type="hidden" value="PATCH">
				<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
				
				<fieldset>
				<input type="hidden" id="id" name="id" value="{{$pedidos->id}}"/>
					<!--Código sería el ID y no lo tocaríamos-->
	            	<div class="form-group">
		            	Usuario:
						<select name="users_id" id="users_id">	
							 @foreach($users as $use)
							<option value="{{ $use->id }}" {{ $use->id == $pedidos->users_id ? 'selected' : '' }}>{{ $use->email }}</option>	
							 @endforeach
						</select>
							 <input type="text" name="usuarios" value="{{$pedidos->user->email}}" readonly/>		
		            </div>
		            <div class="form-group">
		                Total: <input type="text" name="total" value="{{$pedidos->total}}" required/>
		            </div>
		             <!--La Fecha se crea sola, por lo que no la editamos ni creamos manualmente-->		
		            <div class="form-group">
		            	Forma de pago:
						<select name="forma_pago_id" id="forma_pago_id">
							 @foreach($formasPago as $forp)
							<option value="{{ $forp->id }}" {{ $forp->id == $pedidos->forma_pago_id ? 'selected' : '' }}>{{ $forp->nombre }}</option>	
							 @endforeach
						</select>
							 <input type="text" name="formaspago" value="{{$pedidos->forma_pago->nombre}}" readonly/>		
		            </div>		            
		            <div class="form-group">
		                Gastos Envío: <input type="text" name="gastos_envio" value="{{$pedidos->gastos_envio}}"/>
		                @if(is_null($pedidos->gastos_envio))
							<span>No</span>
				 		@else
							<input type="text" name="gastosenvio" value="{{$pedidos->gastos_envio}}" readonly/>
						@endif
		               
		            </div>
		            <div class="form-group">
		            	Estado:
						<select name="estado_id" id="estado_id">
							 @foreach($estado as $esta)
							<option value="{{ $esta->id }}" {{ $esta->id == $pedidos->estado_id ? 'selected' : '' }}>{{ $esta->nombre }}</option>	
							 @endforeach
						</select>
							 <input type="text" name="estado" value="{{$pedidos->estado->nombre}}" readonly/>
		            </div>		   
		            <div class="form-group">
		            	<a href="{{ route('pedidos.index') }}" class="btn btn-danger" >ATRÁS</a>
		                <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>		                
		            </div>
				</fieldset>			
			</form>
			<br>
		</div>
	</div>
</div>
@endsection('content')			