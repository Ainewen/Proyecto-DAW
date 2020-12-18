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
    <div class="row text-center">
		<h1 class="titulo mx-auto">Artículos del pedido número {{$pedidosDet->pedidos_id}}</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<form enctype="" method="POST" action="{{ route('pedidos.addDetalle',$pedidosDet->pedidos_id) }}">
				@csrf							
				<fieldset>
          <div class="form-group">
                    <input type="hidden" name="pedidos_id" value="{{$pedidosDet->id}}"/>
                </div>
					<div class="form-group">
                    Artículo: <select name="articulos_id" id="articulos_id" required>
              <option value=""></option>
               @foreach($articulos as $art)
              <option value="{{ $art->id }}">
                    {{ $art-> }}     
               @endforeach
            </select>
                </div>               
                <div class="form-group">
                    Cantidad: <input type="text" name="cantidad" required/>
                </div>
                <div class="form-group">
                    Descuento: <input type="text" name="descuento">
                </div>
                 <div class="form-group">
                    Precio Unidad: <input type="text" name="precio_und"/>
                </div>
                <div class="form-group">
                  <a href="{{ route('pedidos.index') }}" class="btn btn-danger" >ATRÁS</a>
                    <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>         
                </div>
				</fieldset>			
			</form>
			<br>
			<!--Ver Atributos -->
			<h3>Editar y borrar la línea de articulos del pedido número {{$pedidosDet->id}}</h3>
			<p>Para editar hazlo sobre el propio campo correspondiente</p>		
             <table id="tabla" class="table table-dark w-100">
             <form action="{{ route('pedidos.editDetalle',$pedidosDet->id) }}" method="post"> {{csrf_field()}}
                <thead>
                   <tr>
                      <th>Artículo</th>
                      <th>Cantidad</th>
                      <th>Descuento</th>
                      <th>Precio Unidad €</th>
                   </tr>
                </thead>
                <tbody>
                  <th>
                	@foreach($pedidosDet as $pediDe)
                  Articulo:
                      <select name="articulos_id" id="articulos_id">  
                         @foreach($articulos as $art)
                        <option value="{{ $art->id }}" {{ $art->id == $pedidosDet->articulos_id ? 'selected' : '' }}>{{ $articulos->nombre }}</option>  
                         @endforeach
                      </select>
                  <input type="text" name="articulos" value="{{$pedidosDet->articulos->nombre}}" readonly/>    
                  </th>
                   <th><input type="text" name="cantidad" class="form-control col-xs-1 text-center" value="{{$pedidosDet->cantidad}}"/></th>
                   <th><input type="text" name="descuento" class="form-control col-xs-1 text-center" value="{{$pedidosDet->descuento}}"/></th>
                   <th><input type="text" name="precio_und" class="form-control col-xs-1 text-center" value="{{$pedidosDet->precio_und}}"/></th>
                    <td class="btn-group">
	                    <input type="submit" value="Editar" class="d-inline btn btn-info btn-sm"/>          
						<a href="{{url('/pedidos/destroyDetalle/'.$pedidosDet->id)}}" class="btn btn-danger btn-sm" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">Borrar</a>
					</td>
				</tr>
				
                    @endforeach
                </tbody>
             </table>
             <br>			
		</div>
	</div>
</div>

@endsection('content')