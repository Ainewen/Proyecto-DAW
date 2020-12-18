<!doctype html>
 <!--Vista de la confirmación del pedido que se envía por e-mail al cliente-->
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Factura 20{{$pedido->id}}</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>
<p>Hola {{$user->name}}!</p>
<p>Muchas gracias por confiar en nosotros.</p>
<p>A continuación te envíamos los datos de tu pedido:</p>

@if($pedido->forma_pago->nombre == 'Transferencia')
  <p>El número de cuenta para realizar la transferencia es:</p>
  <p class="text-center">ES13 XXXX XXXX XX XXXXXXXXXX</p>
  <p>En cuanto recibamos la transferencia enviaremos su pedido.</p>
  <p>Muchas gracias!</p>
  @endif

  <table width="100%">
    <tr>
        <td align="top">
            <h3>Fabrica Colchones Zaragoza</h3>
            <p>Ctra. Madrid, Km. 316<br>
            50012 Zaragoza<br>
            B99999999<br>
            976311255<br>
           639115674</p>
        </td>
        <td valign="right">
            
            <h3>{{$user->name}} {{$user->apellidos}}</h3>
            <p>{{$user->direccion}}<br>
           {{$user->cod_postal}}<br>
           {{$user->poblacion}} {{$user->provincia}}<br>
           {{$user->telefono}}<br>
           {{$user->dni}}</p>         
        </td>        
    </tr>
  </table>
  

  <table width="100%">
    <tr>
        <td><strong>Número de factura:</strong>20/{{$pedido->id}}</td>
        <td><strong>Fecha:</strong> {{date('d/m/Y')}}</td>
    </tr>
  </table>
  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Codigo</th>
        <th>Medida</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio Unidad</th>
        <th>Descuento</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
   
        @foreach(Cart::getContent() as $item)
      <tr>

        @foreach ($item->attributes as $key => $attribute)
        <td align="right">{{$attribute}}</td>
        @endforeach
        <td align="right">{{$item->name}}</td>
        <td align="right">{{$item->quantity}}</td>
        <td align="right">{{$item->price}}</td>
        <td align="right">{{$item->descuento ?? ''}}</td>
        <td align="right">{{$item->price*$item->quantity}}</td>
      </tr>      
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">IVA: </td>
            <td align="right">{{$pedido->iva}}€</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total: </td>
            <td align="right" class="gray">{{$pedido->total}}€</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Forma de Pago: </td>
            <td align="right" class="gray">{{$pedido->forma_pago->nombre}}</td>
        </tr>
    </tfoot>
  </table>
  @if($pedido->direccion_envio != null)
      <h3>Datos Envío:</h3>
      <p>{{$pedido->direccion_envio}}<br>
        {{$pedido->codigopostal}}<br>
        {{$pedido->poblacion}}
      </p>
  @endif
</body>
</html>

