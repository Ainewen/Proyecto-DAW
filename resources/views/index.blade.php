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
      <!--Vista del la página principal de la tienda-->
      <div class="row">        
        <!--Buscador de artículos. Filtrar artículos por categorías-->      
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            @if(count($categorias)>0)
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                @foreach($categorias->slice(0, 5) as $cat)
                <li class="nav-item">
                  <a class="nav-link" href="{{route('detalle.categoria', $cat->id)}}">{{ $cat->nombre }}</a>
                </li>
                @endforeach
              </ul>
              <div  class="form-inline">
               <form action="{{ route('busqueda') }}" method="GET">
                  <input class="form-control" placeholder="Buscar artículos..." name="nombre" type="text" >
                  <button type="submit"> <i class="fa fa-search"></i> </button>
                </form>
              </div>
            </div>
            @endif
          </nav>    
        </div>
        <!--Fin Submenú-->

        <div class="row"> 
          <div class="col-lg-12 box border">
            <hr>
            <h2 class="text-center"><strong>LOS MÁS VENDIDOS</strong></h2>
            <hr>
            <div class="row">
              @foreach ($destacados as $artic)
              <div class="col-md-4 box border p-4 mt-5 text-center">
                
                <img class="img-fluid rounded mx-auto d-block" src="img/articulos/{{$artic->imagen1}}"/>
                <h1>{{$artic->nombre}}</h1>
                <p>Precio: {{$artic->precio}}€</p>
                <a class="d-inline btn btn-info" href="{{route('detalle.articulo', $artic->slug)}}">Ver</a>
                @csrf
              
                <input type="hidden" name="id" value="{{$artic->id}}"> 
              </div>           
               @endforeach
              
            </div>           
          </div>
        </div>
        

        <div class="row"> 
          <div class="col-lg-12 box border">
            <hr>
            <h2 class="text-center">PRODUCTOS</h2>
            <hr>
            <div class="row">
              @forelse ($articulos as $artic)
              <div class="col-md-4 box border p-4 mt-5 text-center">
                <img class="img-fluid rounded mx-auto d-block" src="img/articulos/{{$artic->imagen1}}"/>
                <h1>{{$artic->nombre}}</h1>
                <p>Precio: {{$artic->precio}}€</p>
                <a class="d-inline btn btn-info" href="{{route('detalle.articulo', $artic->slug)}}">Ver</a>
                @csrf
                <input type="hidden" name="id" value="{{$artic->id}}">  
              </div>
              @empty        
              @endforelse              
           </div>           
          </div>
        </div> 

        <div class="row"> 
          <div class="col-lg-12 box border">
            <hr>
            <h2 class="text-center">CATEGORIAS</h2>
            <hr>
            <div class="row">
              @foreach ($categorias as $cat)
              <div class="col-md-4 box border p-4 mt-5 text-center">
                <img class="img-fluid rounded mx-auto d-block" src="img/categorias/{{$cat->imagen}}"/>
                <h1>{{$cat->nombre}}</h1>
                <a class="d-inline btn btn-info" href="{{route('detalle.categoria', $cat->id)}}">Ver</a>
                @csrf
                <input type="hidden" name="id" value="{{$cat->id}}">  
              </div>      
              @endforeach
            </div>           
          </div>
        </div>     
   @endsection('content')