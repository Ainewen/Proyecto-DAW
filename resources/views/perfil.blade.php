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
      <!--Vista del perfil del usuario-->
      <div class="row">        
         <div class="col-md-12 box border p-4 mt-5 text-center">
            <h1 class="titulo mx-auto">Bienvenido a tu perfil </h1>
                <br>
            <form method="POST" action="{{ route('perfil.update',$perfil->id) }}">
                <input name="_method" type="hidden" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>  
                            
                <fieldset>
                    <input type="hidden" id="id" name="id" value="{{$perfil->id}}"/>
                    <div class="form-group">
                    E-mail <input type="text" name="email" value="{{$perfil->email}}" required/>
                    </div>
                    <div class="form-group">
                        Password: <input type="password" name="password" value="{{$perfil->password}}"required/>
                    </div>
                    <div class="form-group">
                        Nombre: <input type="text" name="name" value="{{$perfil->name}}" required/>
                    </div>
                    
                    <div class="form-group">
                        Apellidos: <input type="text" name="apellidos" value="{{$perfil->apellidos}}" required/>
                    </div>
                    <div class="form-group">
                        Dirección: <input type="text" name="direccion" value="{{$perfil->direccion}}" required/>
                    </div>
                    <div class="form-group">
                        Población: <input type="text" name="poblacion" value="{{$perfil->poblacion}}" required/>
                    </div>
                    <div class="form-group">
                        Provincia: <input type="text" name="provincia" value="{{$perfil->provincia}}" required/>
                    </div>
                    <div class="form-group">
                        Código Postal: <input type="text" name="cod_postal" value="{{$perfil->cod_postal}}" required/>
                    </div>
                    <div class="form-group">
                        Teléfono: <input type="text" name="telefono" value="{{$perfil->telefono}}" required/>
                    </div>
                    <div class="form-group">
                        DNI: <input type="text" name="dni" value="{{$perfil->dni}}"/>
                    </div>   
                    <div class="form-group">
                        <a href="{{ URL::previous() }}" class="btn btn-danger" >ATRÁS</a>
                        <input type="submit" name="insertar" value="Guardar cambios" class="btn btn-success"/>       
                    </div>                    
                </fieldset>         
            </form>
            <br>            

            <h1>Pedidos Realizados</h1>
                   <table id="tabla" class="table table-dark w-100">
                  <thead>
                    <tr>                        
                      <th>Número de pedido</th>
                      <th>Total</th>
                      <th>Iva</th>
                      <th>Dirección</th>
                      <th>CP</th>
                      <th>Población</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Ver Detalles</th>
                      <th>Factura</th>
                    </tr>
                  </thead>
                  <tbody>
                 @foreach($pedidos as $ped)
                    <input type="hidden" id="id" name="id" value="{{$ped->id}}"/>
                    <th scope="row">{{$ped->id}}</th>    
                    <th scope="row">{{$ped->total}} €</th>
                    <th scope="row">{{$ped->iva}} €</th>
                    <th scope="row">{{$ped->direccion_envio ?? $perfil->direccion}}</th>
                    <th scope="row">{{$ped->codigopostal ?? $perfil->cod_postal}}</th>
                    <th scope="row">{{$ped->poblacion ?? $perfil->poblacion}}</th>
                    <th scope="row">{{$ped->fecha}}</th>
                    <th scope="row">{{$ped->estado->nombre ?? 'No'}}</th>
                    <th scope="row">
                    <a class="d-inline btn btn-info btn-sm" href="{{route('detalle.pedido', $ped->id)}}">Ver</a></th>
                    <td scope="row"><a class="d-inline btn btn-info btn-sm" href="{{route('factura',$ped->id)}}">Factura</a></td></tr>
                 @endforeach            
                </tbody>
            </table>            
         </div>  
       </div>
    </div>
    
   @endsection('content')         