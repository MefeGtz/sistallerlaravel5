<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;

use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Caratulas;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\CaratulasFormRequest;
//para usar la base de datos
use DB;

class CaratulasController extends Controller
{
    //

     //
     public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $caratulas=DB::table('caratulas')->where('marca','LIKE','%'.$query.'%')
         ->orwhere('modelo','LIKE','%'.$query.'%')
        ->orderBy('id','desc')->get();
        return view('huesera.caratulas.index',["caratulas"=>$caratulas,"searchText"=>$query]);
     } 
    }
    public function create(){
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.caratulas.create",["marcas"=>$marcas]);
    }

    public function store(CaratulasFormRequest $request)
    {
        $caratulas=new Caratulas;
        $caratulas->marca=$request->get('marca');
        $caratulas->modelo=$request->get('modelo');
        $caratulas->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/caratulas/',$file->getClientOriginalName());
            $caratulas->imagen=$file->getClientOriginalName();
        }
        $caratulas->save();
            return Redirect::to('huesera/caratulas');
    }

    public function show($id)
    {
        return view("huesera.caratulas.show",["caratulas"=>Caratulas::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.caratulas.edit",["caratulas"=>Caratulas::findOrFail($id),"marcas"=>$marcas]);   
    }
    public function update(CaratulasFormRequest $request,$id)
    {
        $caratulas=Caratulas::findOrFail($id);
        $caratulas->marca=$request->get('marca');
        $caratulas->modelo=$request->get('modelo');
        $caratulas->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/caratulas/',$file->getClientOriginalName());
            $caratulas->imagen=$file->getClientOriginalName();
        }
        $caratulas->update();
        return Redirect::to('huesera/caratulas');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $caratulas=DB::table('caratulas')->where('id','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('huesera/caratulas');
    }   
}
