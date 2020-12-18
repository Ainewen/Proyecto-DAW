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
   <!--Vista del formulario para crear un pedido-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Introducir un Pedido</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<form method="POST" action="{{ route('pedidos.store') }}">
				 @csrf		
							
				<fieldset>
	            	<div class="form-group">
		                Usuario: <select name="users_id" id="users_id" required>
							<option value=""></option>
							 @foreach($users as $use)
							<option value="{{ $use->id }}">
        						{{ $use->email }}			
							 @endforeach
						</select>
		            </div>		           
		            <div class="form-group">
		                Total: <input type="text" name="total" required/>
		            </div>
		            <div class="form-group">
		            	Forma de pago:
						<select name="forma_pago_id" id="forma_pago_id" required>
							<option value=""></option>
							 @foreach($formasPago as $forp)
							<option value="{{ $forp->id }}">
        						{{ $forp->nombre }}			
							 @endforeach
						</select>
		            </div>
		             <div class="form-group">
		                Gastos de Envío: <input type="text" name="gastos_envio"/>
		            </div>
		            <div class="form-group">
		            	Estado:
						<select name="estado_id" id="estado_id" required>
							<option value=""></option>
							 @foreach($estado as $esta)
							<option value="{{ $esta->id }}">
        						{{ $esta->nombre }}			
							 @endforeach
						</select>
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