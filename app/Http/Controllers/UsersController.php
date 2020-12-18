<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\Pedido;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarios=User::all();     
        return view('usuarios.index',compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::orderBy('nombre','ASC')->get();

        return view('usuarios.create',compact('roles'));

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
        $datos=$request->all();
        //dd($request);

        $usuarios = new User;
        $usuarios->email=$datos['email'];
        $usuarios->password= Hash::Make($datos['password']);
        $usuarios->name=$datos['name'];
        $usuarios->apellidos=$datos['apellidos'];
        $usuarios->direccion = $datos['direccion'];
        $usuarios->poblacion = $datos['poblacion'];
        $usuarios->provincia=$datos['provincia'];
        $usuarios->cod_postal=$datos['cod_postal'];
        $usuarios->telefono=$datos['telefono'];
        $usuarios->dni=$datos['dni'];
        $usuarios->roles_id=$datos['roles_id'];
        $usuarios->save();


        return redirect()->route('usuarios.index')->with('flash_message_success','Registro creado satisfactoriamente');
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
        $usuarios=User::find($id);
        $roles=Role::orderBy('nombre','ASC')->get();

        return view('usuarios.edit',compact('usuarios','roles'));
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
        $usuarios=User::Find($id);

        $usuarios->email=$request->email;
        $usuarios->password=Hash::make($request->password);
        $usuarios->name=$request->name;
        $usuarios->apellidos=$request->apellidos;
        $usuarios->direccion = $request->direccion;
        $usuarios->poblacion = $request->poblacion;
        $usuarios->provincia=$request->provincia;
        $usuarios->cod_postal=$request->cod_postal;
        $usuarios->telefono=$request->telefono;
        $usuarios->dni=$request->dni;
        $usuarios->roles_id=$request->roles_id;


        $usuarios->update();

        return redirect()->route('usuarios.index')->with('flash_message_success','Registro actualizado satisfactoriamente');
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
        $usuarios=User::findOrFail($id);

        $usuarios->delete();

        return redirect()->route('usuarios.index')->with('flash_message_error','Registro eliminado satisfactoriamente');
    }
}
