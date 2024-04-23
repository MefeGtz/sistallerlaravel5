<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
//llamamos al modelo  proyecto/modelo
use sistallerl5\Papedir;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\PapedirFormRequest;
//para usar la base de datos
use DB;

class PapedirController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $papedir=DB::table('papedir')->where('tipo','LIKE','%'.$query.'%')
         ->orwhere('nomenclatura','LIKE','%'.$query.'%')
        ->orderBy('idpapedir','desc')->get();
        return view('pedir.papedir.index',["papedir"=>$papedir,"searchText"=>$query]);
     } 
    }
    public function create(){
       // $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("pedir.papedir.create");
    }
    public function store(PapedirFormRequest $request)
    {
        $papedir=new Papedir;
        $papedir->tipo=$request->get('tipo');
        $papedir->nomenclatura=$request->get('nomenclatura');
        $papedir->descripcion=$request->get('descripcion');
        $papedir->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/papedir/',$file->getClientOriginalName());
            $papedir->imagen=$file->getClientOriginalName();
        }
        $papedir->save();
            return Redirect::to('pedir/papedir');
    }

    public function show($id)
    {
        return view("pedir.papedir.show",["papedir"=>Papedir::findOrFail($id)]);
    }
    public function edit($id)
    {
        //$marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("pedir.papedir.edit",["papedir"=>Papedir::findOrFail($id)]);   
    }
    public function update(PapedirFormRequest $request,$id)
    {
        $papedir=Papedir::findOrFail($id);
        $papedir->tipo=$request->get('tipo');
        $papedir->nomenclatura=$request->get('nomenclatura');
        $papedir->descripcion=$request->get('descripcion');
        $papedir->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/papedir/',$file->getClientOriginalName());
            $papedir->imagen=$file->getClientOriginalName();
        }
        $papedir->update();
        return Redirect::to('pedir/papedir');
    }
    public function destroy($id)
    {
        $papedir=DB::table('papedir')->where('idpapedir','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('pedir/papedir');
    }   

}
