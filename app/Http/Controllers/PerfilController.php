<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use App\Models\Pedido;
use App\Models\Detalle_pedido;
use App\Models\Articulo;

class PerfilController extends Controller
{

    //Función que muestra los datos de perfil del usuario logeado, así como los pedidos que ha realizado. Mi Perfil
	public function index()
    {
        //
    	$perfil=Auth::user();
    	$id=Auth::user()->id;
        $pedidos =Pedido::with('User')->where(['users_id'=>$id])->get();

        return view('perfil',compact('perfil','pedidos'))->with(['user' => $perfil]);

    }

    //Función para editar los datos de nuestro perfil
    public function update(Request $request)
    {
    	$id=Auth::user()->id;
        $perfil=User::Find($id);
        $perfil->email=$request->email;
        $perfil->password=Hash::make($request->password);
        $perfil->name=$request->name;
        $perfil->apellidos=$request->apellidos;
        $perfil->direccion = $request->direccion;
        $perfil->poblacion = $request->poblacion;
        $perfil->provincia=$request->provincia;
        $perfil->cod_postal=$request->cod_postal;
        $perfil->telefono=$request->telefono;
        $perfil->dni=$request->dni;
        $perfil->update();

        return redirect()->route('perfil',$id)->with('flash_message_success','Registro actualizado satisfactoriamente');

    }

    //Función para mostrar las líneas de detalle (artículos adquiridos) del pedido seleccionado
    public function detallePedidos($id){

    		$detallePed = Detalle_pedido::with('pedido')->where('pedidos_id','=',$id)->get();
    		
    		return view('detalle.pedido', compact('detallePed'));

    }

    //Función para "imprimir" factura del pedido en pdf y descargar, con los datos de facturación
    public function imprimir($id){
    $detallePed = Detalle_pedido::with('pedido')->where('pedidos_id','=',$id)->get();
    $datos = Pedido::where('id',$id)->first();

  	$pdf = \PDF::loadView('factura', compact('detallePed','datos'));
  	return $pdf->download('Factura 20_'.$id.'.pdf');
	}
}