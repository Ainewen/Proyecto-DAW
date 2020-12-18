@extends('layouts.tienda')
@section('content')

<?php
if(!isset($_SESSION['idarticulo'])){
	session_start();
}else{
	session_destroy();
	session_start();
                
}

?>
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
   <!--Vista del artículo seleccionado en el la página principal de la tienda-->
        <div class="row">
        	 <form action="{{route('cart.add')}}" method="post">
        	 	 @csrf
            <div class="box col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                	{{$articulos->nombre}}
                </h2>
                <hr>
                <div class="row">                 
                    <div class="col-md-6 ml-auto d-flex align-items-center">
                        <img class="img-fluid rounded mx-auto d-block" src="../img/articulos/{{$articulos->imagen1}}" alt="Clásico">
                </div>
                <div class="col-md-6 ml-auto mt-5">
          					<h3>{{$articulos->descripcion_corta}}</h3>
          					<p>{!!$articulos->descripcion_larga!!}</p>
				<!--APARTADO PARA IMPLEMENTAR LA TIENDA CON LA TABLA ATRIBUTOS CUANDO CONSIGA QUE SE PASEN BIEN LOS DATOS AL CARRITO-->

					<!--Selecciona una medida
					<select name="atributos[]" class="selectpicker show-tick form-control">	
						 <option value="0">Medida</option>
						 @foreach($articulos->atributos as $atr)
						<option value="{{$articulos->id}} - {{$atr->sku}} - {{$atr->medida}} -
							 @if(is_null($atr->precio_oferta))
							{{$atr->precio}}€
						@else
							{{$atr->precio_oferta}}€
						@endif">{{$atr->medida}}
						 @if(is_null($atr->precio_oferta))
							{{$atr->precio}}€
						@else
							{{$atr->precio_oferta}}€
						@endif		
						</option>
						 @endforeach				
					</select>-->
          
					<h5>Medida: {{$articulos->medida}}</h5>
						<div class="col-md-6 ml-auto mt-3">
							<h2>PRECIO: {{$articulos->precio}}€</h2>
						</div>
					    <div class="col-md-6 ml-auto mt-5">
                  <input type="hidden" name="id" value="{{$articulos->id}}">
                  <input type="hidden" name="codigo" value="{{$articulos->codigo}}">
                  @if($articulos->stock >=1)
                  <input type="number" name="cantidad" min="1" max="3" value="1">   
                  <input type="submit" name="btn"  class="btn btn-success mt-5" value="Comprar">
                  <a href="{{ url()->previous() }}" class="btn btn-danger mt-5" >VOLVER</a>
                @else
                  	<p>No hay disponibilidad de este artículo.</p>
                  	<input type="submit" name="btn"  class="btn btn-success mt-5" value="Comprar" disabled>
                     <a href="{{ url()->previous() }}" class="btn btn-danger mt-5" >VOLVER</a>
                @endif
                </div>  
            </div>
          </div>
        </div> 
      </form>        
    </div>
  </div>

 @endsection('content')