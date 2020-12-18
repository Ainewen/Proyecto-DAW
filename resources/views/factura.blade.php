<!doctype html>
 <!--Vista de la factura para el cliente, si se la quiere descargar en el su perfil-->
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>

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
        
            <h3>{{auth()->user()->name}} {{auth()->user()->apellidos}}</h3>
            <p>{{auth()->user()->direccion}}<br>
           {{auth()->user()->cod_postal}}<br>
           {{auth()->user()->poblacion}} {{auth()->user()->provincia}}<br>
           {{auth()->user()->telefono}}<br>
           {{auth()->user()->dni}}</p>         
        </td>        
    </tr>
  </table>

  <table width="100%">
    <tr>
        <td><strong>Número de factura:</strong>20/{{$datos->id}}</td>
        <td><strong>Fecha:</strong> {{date('d-m-Y', strtotime($datos->fecha))}}</td>
    </tr>
  </table>
  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Codigo</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio Unidad</th>
        <th>Descuento</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
        @foreach($detallePed as $detp)
      <tr>
        <th scope="row">{{$detp->articulo[0]->codigo}}</th>
        <td>{{$detp->articulo[0]->nombre}}</td>
        <td align="right">{{$detp->cantidad}}</td>
        <td align="right">{{$detp->precio_und}}</td>
        <td align="right">{{$detp->descuento ?? ''}}</td>
        <td align="right">{{$detp->precio_und*$detp->cantidad}}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">IVA: </td>
            <td align="right">{{$detp->pedido->iva}}€</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total: </td>
            <td align="right" class="gray">{{$detp->pedido->total}}€</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Forma de Pago: </td>
            <td align="right" class="gray">{{$datos->forma_pago->nombre}}</td>
        </tr>
    </tfoot>
  </table>
     @if($datos->direccion_envio != null)
      <h3>Datos Envío:</h3>
      <p>{{$datos->direccion_envio}}<br>
        {{$datos->codigopostal}}<br>
        {{$datos->poblacion}}
      </p>
  @endif
</body>
</html>

