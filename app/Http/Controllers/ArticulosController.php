<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Atributo;

class ArticulosController extends Controller
{


    //Mostramos todos los artículos de nuestra base de datos

    public function index(){

        $articulos=Articulo::all();
        return view('articulos.index',compact('articulos'));
    }
	
	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Función para rellenar formulario y crear un artículo

    public function create()
    {
        $categorias=Categoria::orderBy('nombre','ASC')->get();//get() para mostrar todo
        return view('articulos.create',compact('categorias'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Función para recoger datos y guardar el artículo en la tabla correspondiente
    public function store(Request $request)
    {
        //
        $articulos=$request->all();

        if($imagen=$request->file('imagen1')){
            $nombre=$imagen->getClientOriginalName();
            $imagen->move('img/articulos',$nombre);
            $articulos['imagen1']=$nombre;
        }

        Articulo::create($articulos);

        return redirect()->route('articulos.index')->with('flash_message_success','Registro creado satisfactoriamente');
       
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

    //Función para rellenar formulario y editar un artículo
    public function edit($id)
    {
        //
        $articulos=Articulo::find($id);
        $categorias=Categoria::orderBy('nombre','ASC')->get();
        return view('articulos.edit',compact('articulos','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para actualizar un artículo del formulario edit
    public function update(Request $request, $id)
    {
        //
        $articulos=Articulo::Find($id);

        $articulos->codigo=$request->codigo;
        $articulos->nombre=$request->nombre;
        $articulos->precio=$request->precio;
        $articulos->medida=$request->medida;
        $articulos->categorias_id=$request->categorias_id;
        $articulos->descripcion_corta=$request->descripcion_corta;
        $articulos->descripcion_larga=$request->descripcion_larga;
        $articulos->destacados=$request->destacados;
        $articulos->stock=$request->stock;
        $articulos->slug=$request->slug;

        if($imagen=$request->file('imagen1')){
            $nombre=$imagen->getClientOriginalName();
            $imagen->move('img/articulos',$nombre);
            $articulos['imagen1']=$nombre;
        }
            
           $articulos->update();

            return redirect()->route('articulos.index')->with('flash_message_success','Registro actualizado satisfactoriamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Función para eliminar un artículo
    public function destroy($id)
    {
        //
        $articulos=Articulo::findOrFail($id);

        $articulos->delete();

        return redirect()->route('articulos.index')->with('flash_message_error','Registro eliminado satisfactoriamente');
    }

    //FUNCIONES DE LOS ATRIBUTOS

    //Esta parte ha sido la más complicada de desarrollar puesto que usa array multidimensional, ya que decidí usar un formulario dinámico al que podíamos agregar o quitar más campos y así introducir varias entradas a la vez a la base de datos (tabla Atributos)
    
    public function addAtributos(Request $request, $id=null){

        $articulosAtrib = Articulo::with('Atributos')->where(['id'=>$id])->first();        

        if($request->isMethod('post')){
            $datos=$request->all();

            foreach($datos['sku'] as $key => $val){
                if(!empty($val)){
                    //Evitar SKU duplicado
                    $atriContSKU = Atributo::where('sku',$val)->count();
                    if($atriContSKU>0){
                        return redirect('articulos/addAtributos/'.$id)->with('flash_message_error','El SKU ya existe, elija otro distinto');
                    }

                    //Prevenir Medida Duplicada
                    $atriContMedida = Atributo::where(['articulos_id'=>$id,'medida'=>$datos['medida'][$key]])->count();
                    if($atriContMedida>0){
                        return redirect('articulos/addAtributos/'.$id)->with('flash_message_error',''.$datos['size'][$key].'Esa medida ya existe para ese artículo, elija otro distinto');
                }
                //crear atributo
                $datosAtributos = new Atributo;
                $datosAtributos->articulos_id=$id;
                $datosAtributos->sku=$val;
                $datosAtributos->medida=$datos['medida'][$key];
                $datosAtributos->precio=$datos['precio'][$key];
                $datosAtributos->precio_oferta=$datos['precio_oferta'][$key];
                $datosAtributos->stock=$datos['stock'][$key];
                $datosAtributos->save();

            }
            
        }

        return redirect('articulos/addAtributos/'.$id)->with('flash_message_success','Atributos agregados satisfactoriamente.');
      } 

      return view('articulos/addAtributos',compact('articulosAtrib'));
    }
    
    //Función para editar Atributos
    public function editAtributos(Request $request, $id=null){

        if($request->isMethod('post')){
            $datos=$request->all();

            foreach($datos['atrib'] as $key=>$atrib){
                Atributo::where(['id'=>$datos['atrib'][$key]])->update(['sku'=>$datos['sku'][$key],
                'medida'=>$datos['medida'][$key],'precio'=>$datos['precio'][$key],'precio_oferta'=>$datos['precio_oferta'][$key],'stock'=>$datos['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Registro actualizado satisfactoriamente');
        }

    }
 //Función para eliminar Atributos
    public function destroyAtributos($id=null){

        Atributo::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error','El atributo seleccionado se ha eliminado.');

    }


}
