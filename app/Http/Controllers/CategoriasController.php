<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Mostramos todos las categorías de nuestra base de datos
    public function index()
    {
        $categorias=Categoria::all();
        return view('categorias.index',compact('categorias'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Función para rellenar formulario y crear una categoría
    public function create()
    {
        //
        $categorias=Categoria::orderBy('nombre','ASC')->get();//get() para mostrar todo
        return view('categorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Función para recoger datos y guardar la categoría en la tabla correspondiente
    public function store(Request $request)
    {
        //
        $categorias=$request->all();

        if($imagen=$request->file('imagen')){
            $nombre=$imagen->getClientOriginalName();
            $imagen->move('img/categorias',$nombre);
            $categorias['imagen']=$nombre;
        }

        Categoria::create($categorias);

        return redirect()->route('categorias.index')->with('flash_message_success','Registro creado satisfactoriamente');
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
    //Función para rellenar formulario y editar una categoría
    public function edit($id)
    {
        //
        $categorias=Categoria::find($id);
        return view('categorias.edit',compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para actualizar una categoría
    public function update(Request $request, $id)
    {
        //
        $categorias=Categoria::Find($id);

        $categorias->nombre=$request->nombre;
        $categorias->slug=$request->slug;

        if($imagen=$request->file('imagen')){
            $nombre=$imagen->getClientOriginalName();
            $imagen->move('img/categorias',$nombre);
            $categorias['imagen']=$nombre;
        }
            
           $categorias->update();

            return redirect()->route('categorias.index')->with('flash_message_success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para eliminar una categoría
    public function destroy($id)
    {
        //
        $categorias=Categoria::findOrFail($id);

        $categorias->delete();

        return redirect()->route('categorias.index')->with('flash_message_error','Registro eliminado satisfactoriamente');
    }
}
