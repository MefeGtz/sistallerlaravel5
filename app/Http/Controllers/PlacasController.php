<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Placas;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\PlacasFormRequest;
//para usar la base de datos
use DB;

class PlacasController extends Controller
{
    //    
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $placas=DB::table('placas')->where('marca','LIKE','%'.$query.'%')
         ->orwhere('modelo','LIKE','%'.$query.'%')
        ->orderBy('idplacas','desc')->get();
        return view('huesera.placas.index',["placas"=>$placas,"searchText"=>$query]);
     } 
    }
    public function create(){
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.placas.create",["marcas"=>$marcas]);
    }
    public function store(PlacasFormRequest $request)
    {
        $placas=new Placas;
        $placas->marca=$request->get('marca');
        $placas->modelo=$request->get('modelo');
        $placas->descripcion=$request->get('descripcion');
        if (Input::hasFile('foto')){
         $file=Input::file('foto');
           $file->move(public_path().'/imagenes/placas/',$file->getClientOriginalName());
            $placas->foto=$file->getClientOriginalName();
        }
        if (Input::hasFile('foto2')){
            $file=Input::file('foto2');
              $file->move(public_path().'/imagenes/placas/',$file->getClientOriginalName());
               $placas->foto2=$file->getClientOriginalName();
           }
        $placas->save();
            return Redirect::to('huesera/placas');
    }

    public function show($id)
    {
        return view("huesera.placas.show",["placas"=>Placas::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.placas.edit",["placas"=>Placas::findOrFail($id),"marcas"=>$marcas]);   
    }
    public function update(PlacasFormRequest $request,$id)
    {
        $placas=Placas::findOrFail($id);
        $placas->marca=$request->get('marca');
        $placas->modelo=$request->get('modelo');
        $placas->descripcion=$request->get('descripcion');
        if (Input::hasFile('foto')){
         $file=Input::file('foto');
           $file->move(public_path().'/imagenes/placas/',$file->getClientOriginalName());
            $placas->foto=$file->getClientOriginalName();
        }
        if (Input::hasFile('foto2')){
            $file=Input::file('foto2');
              $file->move(public_path().'/imagenes/placas/',$file->getClientOriginalName());
               $placas->foto2=$file->getClientOriginalName();
           }
        $placas->update();
        return Redirect::to('huesera/placas');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $placas=DB::table('placas')->where('idplacas','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('huesera/placas');
    }     
}
