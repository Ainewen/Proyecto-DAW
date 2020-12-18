<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //Redireccíonar a gestion si el rol es mayor o igual a uno, y sino al index de la tienda.
    
    protected $redirectTo = '/';

    //Función para redireccionar al usuario logeado si este es Administrador (reole_id=1)
    protected function redirectTo()
    {   //Para administradores = 1 o editores =2
        if (auth()->user()->roles_id >= 1) {
            return 'gestion';
        }
        return '/';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Función para desconectarse
    public function logout(Request $request) {
            Auth::logout();
    return redirect('/');
    }
}
