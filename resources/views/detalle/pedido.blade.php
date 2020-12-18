@extends('layouts.tienda')
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
     <!--Vista de las línea de detalles (artículos adquiridos) del pedido seleccionado en el perfil del usuario-->
      <div class="row">        
         <div class="col-md-12 box border p-4 mt-5 text-center">
            <h1 class="titulo mx-auto">Detalle de los pedidos realizados</h1>
            <table id="tabla" class="table table-dark w-100">
                  <thead>
                    <tr>                        
                      <th>Articulo</th>
                      <th>Cantidad</th>
                      <th>Precio Unidad</th>
                      <th>Descuento</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($detallePed as $detp)
                    <input type="hidden" id="id" name="id" value="{{$detp->id}}"/>
                    <th scope="row">{{$detp->articulo[0]->nombre}}</th> <th scope="row">{{$detp->cantidad}}</th>   
                    <th scope="row">{{$detp->precio_und}} €</th>
                    <td scope="row">{{$detp->descuento ?? 'No tiene'}}</td>
                    </tr>
                 @endforeach            
                </tbody>
            </table>  
            <a href="{{ URL::previous() }}" class="btn btn-danger" >ATRÁS</a>    
        </div>  
      </div>
    </div>

    @endsection('content') 