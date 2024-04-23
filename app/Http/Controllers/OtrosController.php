<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;

use sistallerl5\Http\Requests;

//llamamos al modelo  proyecto/modelo
use sistallerl5\Otros;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\OtrosFormRequest;
//para usar la base de datos
use DB;

class OtrosController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $otros=DB::table('otros')->where('tipo','LIKE','%'.$query.'%')
         ->orwhere('nomenclatura','LIKE','%'.$query.'%')
        ->orderBy('idotros','desc')->get();
        return view('huesera.otros.index',["otros"=>$otros,"searchText"=>$query]);
     } 
    }
    public function create(){
       // $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.otros.create");
    }
    public function store(OtrosFormRequest $request)
    {
        $otros=new Otros;
        $otros->Tipo=$request->get('Tipo');
        $otros->nomenclatura=$request->get('nomenclatura');
        $otros->descripcion=$request->get('descripcion');
        $otros->cantidad=$request->get('cantidad');
        $otros->contenedor=$request->get('contenedor');
        if (Input::hasFile('foto')){
            $file=Input::file('foto');
              $file->move(public_path().'/imagenes/otros/',$file->getClientOriginalName());
               $otros->foto=$file->getClientOriginalName();
           }
        $otros->save();
            return Redirect::to('huesera/otros');
    }

    public function show($id)
    {
        return view("huesera.otros.show",["otros"=>Otros::findOrFail($id)]);
    }
    public function edit($id)
    {
       //$marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.otros.edit",["otros"=>Otros::findOrFail($id)]);   
    }
    public function update(OtrosFormRequest $request,$id)
    {
        $otros=Otros::findOrFail($id);
        $otros->Tipo=$request->get('Tipo');
        $otros->nomenclatura=$request->get('nomenclatura');
        $otros->descripcion=$request->get('descripcion');
        $otros->cantidad=$request->get('cantidad');
        $otros->contenedor=$request->get('contenedor');
        if (Input::hasFile('foto')){
            $file=Input::file('foto');
              $file->move(public_path().'/imagenes/otros/',$file->getClientOriginalName());
               $otros->foto=$file->getClientOriginalName();
           }
        $otros->update();
        return Redirect::to('huesera/otros');
    }
    public function destroy($id)
    {
        $otros=DB::table('otros')->where('idotros','=',$id)->delete();
        return Redirect::to('huesera/otros');
    }     
}
