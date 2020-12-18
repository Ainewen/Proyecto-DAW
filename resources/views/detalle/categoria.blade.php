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
     <!--Vista del los artículos pertenecientes a la categoría seleccionada en la página principal de la tienda-->
      <div class="row">
        @foreach ($articulos as $artic)
        <div class="col-md-4 box border p-4 mt-5 text-center">
          <img class="img-fluid rounded mx-auto d-block" src="../../img/{{$artic->imagen1}}"/>
          <h1>{{$artic->nombre}}</h1>
          <p>Precio: {{$artic->precio}}€</p>
          <a class="d-inline btn btn-info" href="{{route('detalle.articulo', $artic->slug)}}">Ver</a>
          @csrf
          <input type="hidden" name="id" value="{{$artic->id}}">  
        </div>        
    @endforeach
      </div>
    </div>
   @endsection('content')