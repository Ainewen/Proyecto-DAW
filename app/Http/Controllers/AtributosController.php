<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Atributo;

class AtributosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         session_start();
        if(isset($_SESSION['idarticulo'])){
            if($_SESSION['idarticulo']>0){
        $atributos->Atributo::where('articulos_id','=', $_SESSION['idarticulo'])
        ->orderBy('articulos_id','DESC')->get();//paginate(x) para indicar cuantos registros queremos mostrar

        $crear=Atributo::where('articulos_id','=', $_SESSION['idarticulo'])
        ->count();

        return view('atributos.index',compact('atributos','crear'));
    }else{
        return view('gestion'); 
    }
    }else{
        return view('gestion');
    }

        /*$atributos->Atributo::with('articulos'
            ->get();*/
        /*$articulos=Articulo::with('categoria')
                ->with('medida')
                ->get();*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
