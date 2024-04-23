<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;

//llamamos al modelo  proyecto/modelo
use sistallerl5\Pantallas;
//llamamos a las redirecciones
use Illuminate\Support\Facades\Redirect;
//llamamos a la parte para cargar archivos, en este caso imagenes u otros
use Illuminate\Support\Facades\Input;
//llamamos al request del modelo
use sistallerl5\Http\Requests\PantallasFormRequest;
//para usar la base de datos
use DB;

class PantallasController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $pantallas=DB::table('pantallas')->where('marca','LIKE','%'.$query.'%')
         ->orwhere('modelo','LIKE','%'.$query.'%')
        ->orderBy('idpantallas','desc')->get();
        return view('huesera.pantallas.index',["pantallas"=>$pantallas,"searchText"=>$query]);
     } 
    }
    public function create(){
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.pantallas.create",["marcas"=>$marcas]);
    }

    public function store(PantallasFormRequest $request)
    {
        $pantallas=new Pantallas;
        $pantallas->marca=$request->get('marca');
        $pantallas->modelo=$request->get('modelo');
        $pantallas->descripcion=$request->get('descripcion');
        $pantallas->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/pantallas/',$file->getClientOriginalName());
            $pantallas->imagen=$file->getClientOriginalName();
        }
        $pantallas->ubicacion=$request->get('ubicacion');
        $pantallas->save();
            return Redirect::to('huesera/pantallas');
    }

    public function show($id)
    {
        return view("huesera.pantallas.show",["pantallas"=>Pantallas::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        //$tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.pantallas.edit",["pantallas"=>Pantallas::findOrFail($id),"marcas"=>$marcas]);   
    }
    public function update(PantallasFormRequest $request,$id)
    {
        $pantallas=Pantallas::findOrFail($id);
        $pantallas->marca=$request->get('marca');
        $pantallas->modelo=$request->get('modelo');
        $pantallas->descripcion=$request->get('descripcion');
        $pantallas->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/pantallas/',$file->getClientOriginalName());
            $pantallas->imagen=$file->getClientOriginalName();
        }
        $pantallas->ubicacion=$request->get('ubicacion');
        $pantallas->update();
        return Redirect::to('huesera/pantallas');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $pantallas=DB::table('pantallas')->where('idpantallas','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('huesera/pantallas');
    }   
}
