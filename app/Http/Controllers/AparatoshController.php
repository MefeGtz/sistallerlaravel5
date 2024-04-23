<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
use sistallerl5\Aparatosh;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistallerl5\Http\Requests\AparatoshFormRequest;
use DB;

class AparatoshController extends Controller
{
    //
    public Function __construct(){
        //mientras no este logeado no dejara acceder al sistema
            $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
        $aparatosh=DB::table('aparatosh')->where('tipo','LIKE','%'.$query.'%')
         ->orwhere('marca','LIKE','%'.$query.'%')
        ->orderBy('idaparatosh','desc')->get();
        return view('huesera.aparatosh.index',["aparatosh"=>$aparatosh,"searchText"=>$query]);
     } 
    }
    public function create(){
        $marcas=DB::table('marcas')->get();
        $tipoaparato=DB::table('tipoaparato')->get();
        return view ("huesera.aparatosh.create",["marcas"=>$marcas],["tipoaparato"=>$tipoaparato]);
    }
    public function store(AparatoshFormRequest $request)
    {
        $aparatosh=new Aparatosh;
        $aparatosh->tipo=$request->get('tipo');
        $aparatosh->marca=$request->get('marca');
        $aparatosh->modelo=$request->get('modelo');
        $aparatosh->descripcion=$request->get('descripcion');
        $aparatosh->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
         $file=Input::file('imagen');
           $file->move(public_path().'/imagenes/aparatosh/',$file->getClientOriginalName());
            $aparatosh->imagen=$file->getClientOriginalName();
        }
        $aparatosh->ubicacion=$request->get('ubicacion');
        $aparatosh->save();
            return Redirect::to('huesera/aparatosh');
    }

    public function show($id)
    {
        return view("huesera.aparatosh.show",["aparatosh"=>Aparatosh::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        $tipoaparato=DB::table('tipoaparato')->get();
        return view("huesera.aparatosh.edit",["aparatosh"=>Aparatosh::findOrFail($id),"marcas"=>$marcas,"tipoaparato"=>$tipoaparato]);   
    }
    public function update(AparatoshFormRequest $request,$id)
    {
        $aparatosh=Aparatosh::findOrFail($id);
        $aparatosh->tipo=$request->get('tipo');
        $aparatosh->marca=$request->get('marca');
        $aparatosh->modelo=$request->get('modelo');
        $aparatosh->descripcion=$request->get('descripcion');
        $aparatosh->cantidad=$request->get('cantidad');
        if (Input::hasFile('imagen')){
            $file=Input::file('imagen');
              $file->move(public_path().'/imagenes/aparatosh/',$file->getClientOriginalName());
               $aparatosh->imagen=$file->getClientOriginalName();
           }
        $aparatosh->ubicacion=$request->get('ubicacion');
        $aparatosh->update();
        return Redirect::to('huesera/aparatosh');
    }
    public function destroy($id)
    {
        //revisar esto despues
        $aparatosh=DB::table('aparatosh')->where('idaparatosh','=',$id)->delete();
       // $aparatosh->update();
        return Redirect::to('huesera/aparatosh');
    }     
}
