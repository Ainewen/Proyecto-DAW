<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\WebProfile;
use PayPal\Api\ItemList;
use PayPal\Api\InputFields;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\Models\Pedido;
use App\Models\Detalle_pedido;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Auth;
use Cart;
use Session;

class PaypalController extends Controller
{
    
    //función principal que recoge las siguientes, para procesar el pago
    public function getExpressCheckout($id)
    {
        $checkoutData = $this->checkoutData($id);

        $provider = new ExpressCheckout();

        $response = $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);
    }

    //función para recoger los datos del pedido y enviarlo a paypal para el pago
    private function checkoutData($id)
    {
        
        $cart = Cart::getContent();
       
        $cartItems = array_map(function ($item) use ($cart) {
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']

            ];
        }, $cart->toarray());
 


        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success', $id),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => Session::get('id'),
            'invoice_description' => " Pedido ",
           	'total' => Session::get('Subtotal'),
            'shipping_discount' => null,
        ];

        return $checkoutData;
    }
     //función de pago cancelado
    public function cancelPage()
    {
        return redirect('/')->with('flash_message_success',"Ha cancelado el pago. Contacte con nosotros por favor. Muchas gracias.");
    }

    //función que recoge la situación del pago, actualiza el estado del pedido, limpia el carrito, o nos informa de un error en el pago.
    public function getExpressCheckoutSuccess(Request $request, $id)
    {

        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $checkoutData = $this->checkoutData($id);

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            // Perform transaction on PayPal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if(in_array($status, ['Completed','Processed'])) {
                $order = Pedido::find($id);
                $order->estado_id = 3;
                $order->save();

                Cart::clear();

                Session::forget('cart');

                return redirect('/')->with('flash_message_success',"Su número de pedido es el número $order->id");
            }

        }

        return redirect('/')->with('flash_message_success',"Ha habido un error en el pago.");


    }
}
