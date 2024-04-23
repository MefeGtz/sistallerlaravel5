<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Fallas;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\FallasFormRequest;
//para usar la base de datos
use DB;

class FallasController extends Controller
{
    // 
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $fallas=DB::table('fallas')->where('titulo','LIKE','%'.$query.'%')
         ->orwhere('aparato','LIKE','%'.$query.'%')
        ->orderBy('id','desc')->get();
        return view('fallas.fallas.index',["fallas"=>$fallas,"searchText"=>$query]);
     } 
    }
    public function create(){
        $marcas=DB::table('marcas')->get();
        $tipoaparato=DB::table('tipoaparato')->get();
        return view ("fallas.fallas.create",["marcas"=>$marcas],["tipoaparato"=>$tipoaparato]);
    }
    public function store(FallasFormRequest $request)
    {
        $fallas=new Fallas;
        $fallas->titulo=$request->get('titulo');
        $fallas->aparato=$request->get('aparato');
        $fallas->marca=$request->get('marca');
        $fallas->modelo=$request->get('modelo');
        $fallas->descripcion=$request->get('descripcion');
        if (Input::hasFile('foto')){
         $file=Input::file('foto');
           $file->move(public_path().'/imagenes/fallas/',$file->getClientOriginalName());
            $fallas->foto=$file->getClientOriginalName();
        }
        if (Input::hasFile('foto2')){
            $file=Input::file('foto2');
              $file->move(public_path().'/imagenes/fallas/',$file->getClientOriginalName());
               $fallas->foto2=$file->getClientOriginalName();
           }
        $fallas->save();
            return Redirect::to('fallas/fallas');
    }

    public function show($id)
    {
        return view("fallas.fallas.show",["fallas"=>fallas::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        $tipoaparato=DB::table('tipoaparato')->get();
        return view("fallas.fallas.edit",["fallas"=>Fallas::findOrFail($id),"marcas"=>$marcas,"tipoaparato"=>$tipoaparato]);   
    }

    public function update(FallasFormRequest $request,$id)
    {
        $fallas=Fallas::findOrFail($id);
        $fallas->titulo=$request->get('titulo');
        $fallas->aparato=$request->get('aparato');
        $fallas->marca=$request->get('marca');
        $fallas->modelo=$request->get('modelo');
        $fallas->descripcion=$request->get('descripcion');
        if (Input::hasFile('foto')){
         $file=Input::file('foto');
           $file->move(public_path().'/imagenes/fallas/',$file->getClientOriginalName());
            $fallas->foto=$file->getClientOriginalName();
        }
        if (Input::hasFile('foto2')){
            $file=Input::file('foto2');
              $file->move(public_path().'/imagenes/fallas/',$file->getClientOriginalName());
               $fallas->foto2=$file->getClientOriginalName();
           }
        $fallas->update();
        return Redirect::to('fallas/fallas');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $placas=DB::table('fallas')->where('id','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('fallas/fallas');
    }     
}
