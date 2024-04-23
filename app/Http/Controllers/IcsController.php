<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Ics;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\IcsFormRequest;
//para usar la base de datos
use DB;

class IcsController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
           $query=trim($request->get('searchText')); 
        $ics=DB::table('ics')->where('nomenclatura','LIKE','%'.$query.'%')
        ->orderBy('idics','desc')->get();
        return view('huesera.ics.index',["ics"=>$ics,"searchText"=>$query]);
     } 

     public function create() {
         return view("huesera.ics.create");
     }

     public function store(IcsFormRequest $request){
         $ics= new Ics;
         $ics->nomenclatura=$request->get('nomenclatura');
         $ics->descripcion=$request->get('descripcion');
         $ics->cantidad=$request->get('cantidad');
         $ics->contenedor=$request->get('contenedor');
         $ics->save();
         return Redirect::to('huesera/ics');
     }

     public function edit($id)
     {
        return view("huesera.ics.edit",["ics"=>Ics::findOrFail($id)]);
     }

     public function update(IcsFormRequest $request, $id){

        $ics=Ics::findOrFail($id);
        $ics->nomenclatura=$request->get('nomenclatura');
        $ics->descripcion=$request->get('descripcion');
        $ics->cantidad=$request->get('cantidad');
        $ics->contenedor=$request->get('contenedor');
        $ics->save();
        return Redirect::to('huesera/ics');
     }

     public function destroy ($id)
     {
         $ics=DB::table('ics')->where('idics','=',$id)->delete();
         return Redirect::to('huesera/ics');
     }
}