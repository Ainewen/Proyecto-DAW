<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\User;
use App\Models\Forma_pago;
use App\Models\Estado;
use App\Models\Articulo;
use App\Models\Detalle_pedido;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Mostramos todos los pedidos de nuestra base de datos
    public function index()
    {
        //       
        $pedidos=Pedido::all();
        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Función para rellenar formulario y crear un pedido
    public function create()
    {
        //
         $users=User::orderBy('email','ASC')->get();//get() para mostrar todo
         $formasPago=Forma_pago::orderBy('nombre','ASC')->get();
         $estado=Estado::orderBy('nombre','ASC')->get();
        return view('pedidos.create',compact('users','formasPago','estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Función para recoger datos y guardar el pedido en la tabla correspondiente
    public function store(Request $request)
    {
        //
         $pedidos=$request->all();
         Pedido::create($pedidos);

        return redirect()->route('pedidos.index')->with('flash_message_success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Función para rellenar formulario y editar un pedido
    public function edit($id)
    {
        //
        $pedidos=Pedido::find($id);
        $users=User::orderBy('email','ASC')->get();//get() para mostrar todo
         $formasPago=Forma_pago::orderBy('nombre','ASC')->get();
         $estado=Estado::orderBy('nombre','ASC')->get();
         
          return view('pedidos.edit',compact('pedidos','users','formasPago','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para actualizar el pedido del formulario edit
    public function update(Request $request, $id)
    {
        //
        $pedidos=Pedido::Find($id);
        $pedidos->update($request->all());

        return redirect()->route('pedidos.index')->with('flash_message_success','Registro actualizado satisfactoriamente');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //LOS PEDIDOS NO SE PUEDEN BORRAR! en todo caso cambiaríamos el estado a cancelado.
    public function destroy($id)
    {
        //
    }


    //VER LOS PEDIDOS DE LOS USUARIOS:

    public function usuariospedidos(Request $request,$id){

        $usuariospedidos = Pedido::with('User')->where(['users_id'=>$id])->get();
        $usuarios = User::where(['id'=>$id])->first();

        return view('pedidos/usuarios-pedidos',compact('usuariospedidos','usuarios'));   
    }

    //Función para mostrar las líneas de detalle (artículos adquiridos) del pedido seleccionado
    public function detallePedidos($id){

            $detallePed = Detalle_pedido::with('pedido')->where('pedidos_id','=',$id)->get();
            
            return view('pedidos/usuarios-detalle-ped', compact('detallePed'));

    }

}
