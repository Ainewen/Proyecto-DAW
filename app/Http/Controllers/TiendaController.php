<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;


class TiendaController extends Controller
{
    
    //Función creada inicialmente para trabajar con la tabla Artículos y la tabla Atributos. Se implementará más adelante.

     /*public function index(){

        $articulos=Articulo::with('Atributo')
        		->where('id','=','articulos_id')
        		->get();
        return view('index',compact('articulos'));

    }*/

    //Función creada para mostrar los artículos destacados, todos los artículos y las categorías en la página index de la tienda.
    public function index(){
        
        $articulos = Articulo::All();
        $categorias = Categoria::All();
        $destacados = Articulo::where('destacados','=', '1')->get();
        return view('index')->with(compact('articulos', 'categorias','destacados'));
    }
    
    //Función para ver el detalle del artículo que seleccione el cliente
    public function detalle ($slug){

         /*$articulos = Articulo::with('atributos')->where('id',$id)->first();*/         
        $articulos = Articulo::where('slug',$slug)->first();
        
        return view('detalle.articulo',compact('articulos'));
    }

    //Función para ver los productos de la categoría seleccionada en el menú principal.
    public function detalleCategoria ($id){        
       
        $articulos=Articulo::where('categorias_id','=',$id)->get();       

        return view('detalle.categoria',compact('articulos'));
    }

    //Función para buscar articulos. De momento busca solo en el nombre.
    public function buscador(Request $request){

        $nombre=$request->get('nombre');

        $articulos = Articulo::orderBy('id','DESC')
        ->nombre($nombre)
        ->paginate(3);

        return view ('busqueda',compact('articulos'));
    }


}
