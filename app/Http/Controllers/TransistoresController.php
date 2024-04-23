<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Transistores;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\TransistoresFormRequest;
//para usar la base de datos
use DB;

class TransistoresController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
           $query=trim($request->get('searchText')); 
        $transistores=DB::table('transistores')->where('nomenclatura','LIKE','%'.$query.'%')
        ->orwhere('descripcion','LIKE','%'.$query.'%')
        ->orderBy('idtransistores','desc')->get();
        return view('huesera.transistores.index',["transistores"=>$transistores,"searchText"=>$query]);
     } 

     public function create() {
         return view("huesera.transistores.create");
     }

     public function store(TransistoresFormRequest $request){
         $transistores= new Transistores;
         $transistores->nomenclatura=$request->get('nomenclatura');
         $transistores->descripcion=$request->get('descripcion');
         $transistores->cantidad=$request->get('cantidad');
         $transistores->contenedor=$request->get('contenedor');
         $transistores->save();
         return Redirect::to('huesera/transistores');
     }

     public function edit($id)
     {
        return view("huesera.transistores.edit",["transistores"=>Transistores::findOrFail($id)]);
     }

     public function update(TransistoresFormRequest $request, $id){

        $transistores=Transistores::findOrFail($id);
        $transistores->nomenclatura=$request->get('nomenclatura');
        $transistores->descripcion=$request->get('descripcion');
        $transistores->cantidad=$request->get('cantidad');
        $transistores->contenedor=$request->get('contenedor');
        $transistores->update();
        return Redirect::to('huesera/transistores');
     }

     public function destroy ($id)
     {
         $transisitores=DB::table('transistores')->where('idtransistores','=',$id)->delete();
         return Redirect::to('huesera/transistores');
     }

}
