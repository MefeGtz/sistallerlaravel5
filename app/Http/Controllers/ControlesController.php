<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;

//llamamos al modelo  proyecto/modelo
use sistallerl5\Controles;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\ControlesFormRequest;
//para usar la base de datos
use DB;

class ControlesController extends Controller
{
    //
     //
     public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $controles=DB::table('controles')->where('marca','LIKE','%'.$query.'%')
         ->orwhere('modelo','LIKE','%'.$query.'%')
        ->orderBy('id','desc')->get();
        return view('huesera.controles.index',["controles"=>$controles,"searchText"=>$query]);
     } 
    }
    public function create(){
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.controles.create",["marcas"=>$marcas]);
    }

    public function store(ControlesFormRequest $request)
    {
        $controles=new Controles;
        $controles->marca=$request->get('marca');
        $controles->modelo=$request->get('modelo');
        $controles->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/controles/',$file->getClientOriginalName());
            $controles->imagen=$file->getClientOriginalName();
        }
        $controles->save();
            return Redirect::to('huesera/controles');
    }

    public function show($id)
    {
        return view("huesera.controles.show",["controles"=>Controles::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.controles.edit",["controles"=>Controles::findOrFail($id),"marcas"=>$marcas]);   
    }
    public function update(ControlesFormRequest $request,$id)
    {
        $controles=Controles::findOrFail($id);
        $controles->marca=$request->get('marca');
        $controles->modelo=$request->get('modelo');
        $controles->descripcion=$request->get('descripcion');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/controles/',$file->getClientOriginalName());
            $controles->imagen=$file->getClientOriginalName();
        }
        $controles->update();
        return Redirect::to('huesera/controles');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $controles=DB::table('controles')->where('id','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('huesera/controles');
    }   
}
