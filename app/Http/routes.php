<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
@if (Route::has('login'))
<div class="top-right links">
    @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
    @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Register</a>
    @endif
</div>
@endif
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");
*/

        Route::resource('huesera/aparatosh','AparatoshController');
        Route::resource('clienteap/cliente_aparato','Cliente_aparatoController');
        Route::resource('clienteap/graficas','Cliente_aparatoController@graficas');
        Route::resource('clienteap/entregar','Cliente_aparatoController@entregar');
        Route::resource('seguridad/usuario','usuarioController');
        Route::resource('huesera/transistores','TransistoresController');
        Route::resource('huesera/ics','IcsController');
        Route::resource('huesera/placas','PlacasController');
        Route::resource('huesera/pantallas','PantallasController');
        Route::resource('huesera/otros','OtrosController');
        Route::resource('huesera/flybacks','FlybacksController');
        Route::resource('pedir/papedir','PapedirController');
        Route::resource('huesera/controles','ControlesController');
        Route::resource('huesera/caratulas','CaratulasController');
        Route::resource('fallas/fallas','FallasController');
        Route::resource('acercade','AcercadeController');

        
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('{slug?}','Cliente_aparatoController@graficas');
Route::get('/', function () {
    if(Auth::check()){
       return  Route('clienteap/graficas','Cliente_aparatoController@graficas');
    }else{
        return view('auth/login');
    }
});

