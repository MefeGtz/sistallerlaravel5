<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
use sistallerl5\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistallerl5\Http\Requests\usuarioFormRequest;
use DB;

class usuarioController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
           $query=trim($request->get('searchText')); 
        $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
        ->orderBy('id','desc')
        ->paginate(10);
        return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
     } 

     public function create() {
         return view("seguridad.usuario.create");
     }

     public function store(usuarioFormRequest $request){
         $usuario= new User;
         $usuario->name=$request->get('name');
         $usuario->email=$request->get('email');
         $usuario->password=bcrypt($request->get('password'));
         $usuario->save();
         return Redirect::to('seguridad/usuario');
     }

     public function edit($id)
     {
        return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
     }

     public function update(usuarioFormRequest $request, $id){

        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('seguridad/usuario');
     }

     public function destroy ($id)
     {
         $usuario=DB::table('users')->where('id','=',$id)->delete();
         return Redirect::to('seguridad/usuario');
     }

}
