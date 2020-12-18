<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Articulo;
use App\Models\Atributo;
use Auth;
use App\Models\Pedido;
use App\Models\Detalle_pedido;
use App\Models\Forma_pago;
use Mail;
use Session;

class CartController extends Controller
{
    //Función para agregar artículos al carrito
    public function add(Request $request){

       $articulos = Articulo::find($request->id); 

        Cart::add(
            $articulos->id, 
            $articulos->nombre,
            $articulos->precio,  
            $request->cantidad,
            array("codigo"=>$articulos->codigo,
                  "medida"=>$articulos->medida) 
           
        );

        return back()->with('flash_message_success',"$articulos->nombre ¡se ha agregado con éxito al carrito!");
   
    }

    //Función para ver el carrito
    public function cart(Request $request){

            return view('cart');
    }
    //Función para quitar artículo del carrito
    public function removeitem(Request $request) {
        
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('flash_message_error',"Producto eliminado con éxito de su carrito.");
    }
    //Función para vaciar el carrito
    public function clear(){
        Cart::clear();
        return back()->with('flash_message_error',"El carrito se ha vacíado.");
    }

    //Función para tramitar pedido de los artículos del carrito
    public function checkout(Request $request){
        if(Auth::check()){
            $formapago = Forma_pago::all();
            return view('checkout',compact('formapago'));

            }else{
                    
                return redirect('login');
            }
    }

    //Función para confirmar el pedido y elegir forma de pago e indicar si la dirección de envío es distinta. 

    public function pedido (Request $request){

        if(Cart::getContent()->count()>0){

            $pedido = new Pedido();
            $pedido->users_id = Auth::user()->id;
            $pedido->iva = number_format(Cart::getSubTotal()/1.21,2);
            $pedido->total = number_format(Cart::getSubTotal());
            $pedido->forma_pago_id = $request->forma_pago;
            $pedido->gastos_envio = null;
            $pedido->estado_id = 1;
                if(!empty($request->direccion_envio)){
                $pedido->direccion_envio = $request->direccion_envio ; 
                }
                if(!empty($request->codigopostal)){
                $pedido->codigopostal = $request->codigopostal;
                }
                if(!empty($request->poblacion)){
                $pedido->poblacion = $request->poblacion;   
                }
             $pedido->save();

            foreach(Cart::getContent() as  $r){

                $detalle = new Detalle_pedido();
                $detalle->pedidos_id = $pedido->id;
                $detalle->articulos_id = $r->id;
                $detalle->cantidad = $r->quantity;
                $detalle->descuento = null;
                $detalle->precio_und = $r->price;
                $detalle->save();
            }
                      
            //Actualizar stock. Falta por implementar, debido a que trabajamos sobre pedido realizado no es necesario por el momento.                

           /*foreach(Cart::getContent() as $item){
                    $nuevoStock = $articulos->stock - $item->quantity;                   
                        }
            if($nuevoStock<0){
                    $nuevoStock = 0;
                }
            $articulos->update(['stock'=>$nuevoStock]);*/
            

            //Guardar datos del pedido en Session

            Session::put('id',$pedido->id);
            Session::put('Subtotal',number_format(Cart::getSubTotal()));
           
           

                 $user=Auth::user();
                 $detalle=Detalle_pedido::where('pedidos_id',$pedido->id)->get();                
                 //enviar correo al cliente
                 $articulos=Articulo::where('id',$r->id)->get();
                 Mail::send(
                'confirmacion',
                ['user' => $user,'pedido'=>$pedido,'detalle'=>$detalle,'articulos'=>$articulos],
                function($message) use ($user){
                    $message->to($user->email);
                    $message->subject("Confirmacion de pedido");
                }
            );

            //PAGO 

             //si es con paypal o tarjeta. Lo hemos englobado en lo mismo ya que actualmente no disponemos de pasarela con tarjeta.
        if(request('forma_pago') <= '2') {

                Cart::session('cart'); 
                //redirección a paypal
            return redirect()->route('paypal.checkout', $pedido->id);

            }else{
                //vacíamos el carrito
                 Cart::clear();

            return redirect('/')->with('flash_message_success',"Su número de pedido es el número $pedido->id");
            }
              
           
        }else{
            
            return redirect('/')->with('flash_message_error',"Ha habido un error. Disculpe las molestias.");
        }
    }
}