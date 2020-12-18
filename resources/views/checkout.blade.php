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
    <!--Vista del la tabla con el carrito para confirmar el pedido-->
    <div class="row mt-4">
       <div class="col-sm-12 bg-light table-responsive-lg">
            <table class="table table-striped">
                <thead>
                    <th>SKU</th>
                    <th>MEDIDA</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                </thead>
                <tbody>                   
                    @foreach (Cart::getContent() as $item) 
                    <input type="hidden" name="id" value="{{$item->id}}">                 
                        <tr>
                            @foreach ($item->attributes as $key => $attribute)
                            <td>{{$attribute}}</td>
                             @endforeach
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}} €</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-link btn-sm text-danger">X</button>
                                </form>
                            </td>
                        </tr>
                         @endforeach
                        <td colspan="6" class="text-right"> Total {{number_format(Cart::getSubtotal(),2)}}€</td>
                </tbody>
            </table>
            <div class="row mb-5">
                <div class="col-sm-12 mx-auto">
                    <form action="{{route('cart.pedido')}}" method="POST">
                        @csrf
                        <h3>Rellenar solo si la dirección de envío es distinta a la del registro.</h3>
                        <div class="form-group">
                            Dirección de envío: <input type="text" name="direccion_envio"/>
                        </div>
                        <div class="form-group">
                           Código Postal: <input type="text" name="codigopostal" pattern="(^([0-9]{5,5})|^)$"/>
                        </div>
                        <div class="form-group">
                           Población: <input type="text" name="poblacion"/>
                        </div>
                        <div class="form-group">
                            Seleccione una forma de pago:
                            <br>
                            @foreach ($formapago as $formp)
                            <label class="mr-2"><input type="radio" name="forma_pago" value="{{$formp->id}}" required> {{$formp->nombre}}</label><img src="img/formaspago/{{$formp->imagen}}"><br>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill">Confirmar Pedido</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

@endsection