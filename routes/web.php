<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta para el index de la tienda pantalla principal
Route::get('/', 'App\Http\Controllers\TiendaController@index' );

Route::match(['get','post'],"articulo/{slug}", "App\Http\Controllers\TiendaController@detalle" )->name('detalle.articulo');
Route::match(['get','post'],"categoria/{id}", "App\Http\Controllers\TiendaController@detalleCategoria")->name('detalle.categoria');

Route::match(['get','post'],"busqueda", "App\Http\Controllers\TiendaController@buscador")->name('busqueda');

Auth::routes(['verify' => true]);

//Ruta acceso de administradores, aplicamos el middleware que hemos llamado admin en el Kernel.php
//también van aquí las rutas resource del CRUD de gestión interna
Route::group(['middleware' => ['admin']], function () {
    Route::get('gestion', 'App\Http\Controllers\GestionController@index')->name('gestion');
    Route::resource("articulos", "App\Http\Controllers\ArticulosController");
    Route::resource("categorias", "App\Http\Controllers\CategoriasController");

	Route::match(['get','post'],"articulos/addAtributos/{id}", "App\Http\Controllers\ArticulosController@addAtributos")->name('articulos.addAtributos');
	Route::match(['get','post'],"articulos/editAtributos/{id}", "App\Http\Controllers\ArticulosController@editAtributos")->name('articulos.editAtributos');
	Route::match(['get','post'],"articulos/destroyAtributos/{id}", "App\Http\Controllers\ArticulosController@destroyAtributos")->name('articulos.destroyAtributos');

	Route::resource("pedidos", "App\Http\Controllers\PedidosController");
	Route::match(['get','post'],"pedidos/usuarios-pedidos/{id}", "App\Http\Controllers\PedidosController@usuariospedidos")->name('pedidos.usuarios-pedidos');
	Route::match(['get','post'],"pedidos/usuarios-detalle-ped/{id}", "App\Http\Controllers\PedidosController@detallePedidos")->name('pedidos.usuarios-detalle-ped');
	
	//SI DA TIEMPO HACERLO, SINO DEJARLO
	Route::match(['get','post'],"pedidos/adddDetalle/{id}", "App\Http\Controllers\PedidosController@addDetalle")->name('pedidos.addDetalle');
	Route::match(['get','post'],"pedidos/editDetalle/{id}", "App\Http\Controllers\PedidosController@editDetalle")->name('pedidos.editDetalle');
	Route::match(['get','post'],"pedidos/destroyDetalle/{id}", "App\Http\Controllers\PedidosController@destroyDetalle")->name('pedidos.destroyDetalle');
	Route::resource("formaspago", "App\Http\Controllers\FormaPagosController");
	Route::resource("usuarios", "App\Http\Controllers\UsersController");
    });

//Rutas de perfil, para ver, actualizar y ver el detalle de los pedidos, así como para la factura.
Route::match(['get','post'],"perfil/{id}", "App\Http\Controllers\PerfilController@index" )->name('perfil')->middleware('auth','verified');

Route::match(['get','post'],"perfil", "App\Http\Controllers\PerfilController@update" )->name('perfil.update')->middleware('auth','verified');

Route::match(['get','post'],"detalle/pedido/{id}", "App\Http\Controllers\PerfilController@detallePedidos" )->name('detalle.pedido')->middleware('auth','verified');

Route::match(['get','post'],'/imprimir/{id}', 'App\Http\Controllers\PerfilController@imprimir')->name('factura')->middleware('auth','verified');

//Implementamos las rutas del carrito y hacer pedido
Route::post('/cart-add','App\Http\Controllers\CartController@add')->name('cart.add');

Route::match(['get','post'],'/cart','App\Http\Controllers\CartController@cart')->name('cart.cart');

Route::post('/cart-clear','App\Http\Controllers\CartController@clear')->name('cart.clear');

Route::post('/cart-removeitem','App\Http\Controllers\CartController@removeitem')->name('cart.removeitem');

Route::match(['get','post'],'/checkout','App\Http\Controllers\CartController@checkout')->name('cart.checkout')->middleware('auth','verified');

Route::match(['get','post'],'/pedido','App\Http\Controllers\CartController@pedido')->name('cart.pedido')->middleware('auth','verified');

//Rutas para el pago por paypal
Route::get('paypal/checkout/{order}', 'App\Http\Controllers\PaypalController@getExpressCheckout')->name('paypal.checkout')->middleware('auth','verified');
Route::get('paypal/checkout-success/{order}', 'App\Http\Controllers\PaypalController@getExpressCheckoutSuccess')->name('paypal.success')->middleware('auth','verified');
Route::get('paypal/checkout-cancel', 'App\Http\Controllers\PaypalController@cancelPage')->name('paypal.cancel')->middleware('auth','verified');

// Rutas para resetear la contraseña
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.reset');

Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');