<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Flybacks;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\FlybacksFormRequest;
//para usar la base de datos
use DB;


class FlybacksController extends Controller
{
    // 
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $flybacks=DB::table('flybacks')->where('nomenclatura','LIKE','%'.$query.'%')
        ->orderBy('idflybacks','desc')->get();
        return view('huesera.flybacks.index',["flybacks"=>$flybacks,"searchText"=>$query]);
     } 
    }
    public function create(){
        //$marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.flybacks.create");
    }
    public function store(FlybacksFormRequest $request)
    {
        $flybacks=new Flybacks;
        $flybacks->nomenclatura=$request->get('nomenclatura');
        $flybacks->descripcion=$request->get('descripcion');
        if (Input::hasFile('foto')){
         $file=Input::file('foto');
           $file->move(public_path().'/imagenes/flybacks/',$file->getClientOriginalName());
            $flybacks->foto=$file->getClientOriginalName();
        }
        if (Input::hasFile('foto2')){
            $file=Input::file('foto2');
              $file->move(public_path().'/imagenes/flybacks/',$file->getClientOriginalName());
               $flybacks->foto2=$file->getClientOriginalName();
           }
           if (Input::hasFile('foto3')){
            $file=Input::file('foto3');
              $file->move(public_path().'/imagenes/flybacks/',$file->getClientOriginalName());
               $flybacks->foto3=$file->getClientOriginalName();
           }
        $flybacks->ubicacion=$request->get('ubicacion');
        $flybacks->save();
            return Redirect::to('huesera/flybacks');
    }

    public function show($id)
    {
        return view("huesera.flybacks.show",["flybacks"=>Flybacks::findOrFail($id)]);
    }
    public function edit($id)
    {
       // $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.flybacks.edit",["flybacks"=>Flybacks::findOrFail($id)]);   
    }
    public function update(FlybacksFormRequest $request,$id)
    {
        $flybacks=Flybacks::findOrFail($id);
        $flybacks->nomenclatura=$request->get('nomenclatura');
        $flybacks->descripcion=$request->get('descripcion');
        if (Input::hasFile('foto')){
         $file=Input::file('foto');
           $file->move(public_path().'/imagenes/flybacks/',$file->getClientOriginalName());
            $flybacks->foto=$file->getClientOriginalName();
        }
        if (Input::hasFile('foto2')){
            $file=Input::file('foto2');
              $file->move(public_path().'/imagenes/flybacks/',$file->getClientOriginalName());
               $flybacks->foto2=$file->getClientOriginalName();
           }
           if (Input::hasFile('foto3')){
            $file=Input::file('foto3');
              $file->move(public_path().'/imagenes/flybacks/',$file->getClientOriginalName());
               $flybacks->foto3=$file->getClientOriginalName();
           }
        $flybacks->ubicacion=$request->get('ubicacion');
        $flybacks->update();
        return Redirect::to('huesera/flybacks');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $flybacks=DB::table('flybacks')->where('idflybacks','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('huesera/flybacks');
    }   
}
