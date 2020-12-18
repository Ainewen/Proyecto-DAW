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

    <!--Vista para agregar atributos a los artículos-->
    <div class="row text-center">
		<h1 class="titulo mx-auto">Atributos de  {{$articulosAtrib->nombre}}</h1>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 justify-content-left bg-light">
			<br>
			<h3>Agregar atributos para {{$articulosAtrib->nombre}}</h3>
			<form enctype="" method="POST" action="{{ route('articulos.addAtributos',$articulosAtrib->id) }}">
				@csrf							
				<fieldset>
					<div class="form-group">
	                	<input type="hidden" name="atrib[]" value="{{$articulosAtrib->id}}"/>
	            	</div>
					<div class="form-group">
	                	Código: <input type="text" name="codigo" value="{{$articulosAtrib->codigo}}" readonly/>
	            	</div>
					<div class="form-group form-inline">
						<div class="field_wrapper">							
                			<input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control col-xs-1" required/>
                			<input type="text" name="medida[]" id="medida" placeholder="Medida" class="form-control col-xs-1" required/>
                			<input type="text" name="precio[]" id="precio" placeholder="Precio" class="form-control col-xs-1" required/>
                			<input type="text" name="precio_oferta[]" id="precio_oferta" placeholder="Precio Oferta" class="form-control col-xs-1"/>
                			<input type="text" name="stock[]" id="stock" placeholder="Stock" class="form-control col-xs-1" required/>
                			<a href="javascript:void(0);" class="add_button" title="Add field"><img src="../../../img/iconos/add-icon.png"/></a> 
	                	</div>	 
	            	</div>
		            <div class="form-group">
		            	<a href="{{ route('articulos.index') }}" class="btn btn-danger" >ATRÁS</a>
		                <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>   
		            </div>
				</fieldset>			
			</form>
			<br>
			<!--Ver Atributos, editar y borrar -->
			<h3>Editar y borrar los atributos {{$articulosAtrib->nombre}}</h3>
			<p>Para editar hazlo sobre el propio campo correspondiente</p>		
             <table id="tabla" class="table table-dark w-100">
             <form enctype="multipart/form-data" action="{{ route('articulos.editAtributos',$articulosAtrib->id) }}" method="post"> {{csrf_field()}}
                <thead>
                   <tr>
                      <th>SKU</th>
                      <th>Medida</th>
                      <th>Precio €</th>
                      <th>Precio Oferta €</th>
                      <th>Stock</th>
                      <th>Opciones</th>
                   </tr>
                </thead>
                <tbody>
                	@foreach($articulosAtrib['Atributos'] as $atributo)
                   <input type="hidden" name="atrib[]" value="{{$atributo->id}}"/>
                   <th><input type="text" name="sku[]" class="form-control col-xs-1 text-center" value="{{$atributo->sku}}"/></th>
                   <th><input type="text" name="medida[]" class="form-control col-xs-1 text-center" value="{{$atributo->medida}}"/></th>
                   <th><input type="text" name="precio[]" class="form-control col-xs-1 text-center" value="{{$atributo->precio}}"/></th>
                   <th><input type="text" name="precio_oferta[]" class="form-control col-xs-1 text-center" value="{{$atributo->precio_oferta}}"/></th>
                    <th><input type="text"name="stock[]" class="form-control col-xs-1 text-center" value="{{$atributo->stock}}"/></th>
                    <td class="btn-group">
	                    <input type="submit" value="Editar" class="d-inline btn btn-info btn-sm"/>          
          						<a href="{{url('/articulos/destroyAtributos/'.$atributo->id)}}" class="btn btn-danger btn-sm" onclick="return confirmar('¿Está seguro que desea eliminar el registro?')">Borrar</a>
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