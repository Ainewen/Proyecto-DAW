<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Auth;

class GestionController extends Controller
{
    //Creo un constructor en el controlaodor del administrador y le digo que use el middelware indicado
    public function __construct(){
        $this->middleware('App\Http\Middleware\EsAdmin');
    }

   	//Función para mostrar el índice de la gestión (pantalla principal con él menú para los distintos apartados)
    public function index()
    {
       return view('gestion.index');
    }

}