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
    <!--Vista del la tabla del carrito de la compra-->
    <div class="row mt-4">
       <div class="col-sm-12 bg-light table-responsive-lg">
           @if (count(Cart::getContent()))
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
                <div class="col-sm-6">
                    <form action="{{route('cart.clear')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-pill mx-auto d-block">Vaciar Carrito</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="{{route('cart.checkout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-pill mx-auto d-block">Tramitar Pedido</button>
                    </form>                
                </div>
            @else
                <p>Carrito vacio</p>
           @endif
            </div>
        </div>
    </div>       
@endsection