<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Forma_pago;

class FormaPagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Mostramos todas las formas de pago de nuestra base de datos
    public function index()
    {
        //
        $formasPago=Forma_pago::all();
        return view('formaspago.index',compact('formasPago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Función para rellenar formulario y crear una forma de pago
    public function create()
    {
        //
         $formasPago=Forma_pago::orderBy('nombre','ASC')->get();//get() para mostrar todo
        return view('formaspago.create',compact('formasPago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //Función para recoger datos y guardar la forma de pago en la tabla correspondiente
    public function store(Request $request)
    {
        //
        $formasPago=$request->all();

        if($imagen=$request->file('imagen')){
            $nombre=$imagen->getClientOriginalName();
            $imagen->move('img/formaspago',$nombre);
            $formasPago['imagen']=$nombre;
        }

       Forma_pago::create($formasPago);

        return redirect()->route('formaspago.index')->with('flash_message_success','Registro creado satisfactoriamente');
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

    //Función para rellenar formulario y editar la forma de pago
    public function edit($id)
    {
        //
         $formasPago=Forma_pago::find($id);
        return view('formaspago.edit',compact('formasPago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Función para actualizar la forma de pago del formulario edit
    public function update(Request $request, $id)
    {
        //
        $formasPago=Forma_pago::Find($id);

        $formasPago->nombre=$request->nombre;
        
        if($imagen=$request->file('imagen')){
            $nombre=$imagen->getClientOriginalName();
            $imagen->move('img/formaspago',$nombre);
            $formasPago['imagen']=$nombre;
        }
            
           $formasPago->update();

            return redirect()->route('formaspago.index')->with('flash_message_success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para eliminar una forma de pago
    public function destroy($id)
    {
        //
        $formasPago=Forma_pago::findOrFail($id);

        $formasPago->delete();

        return redirect()->route('formaspago.index')->with('flash_message_error','Registro eliminado satisfactoriamente');
    }
}
