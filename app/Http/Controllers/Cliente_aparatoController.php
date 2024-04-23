<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;
use sistallerl5\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sistallerl5\Http\Requests\Cliente_aparatoFormRequest;
use sistallerl5\Http\Requests\EntregaFormRequest;
use sistallerl5\Cliente_aparato;
use Carbon\Carbon;
use Response;
use DB;

//use Carbon\Carbon;
//use Response;
//use Illuminate\Support\Collection 
           //->paginate(8); y en la plantilla
//{{$cliente_aparato->render()}}

class Cliente_aparatoController extends Controller
{
    //

    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        if($request){
           $query=trim($request->get('searchText')); 
           $cliente_aparato=DB::table('cliente_aparato')->where('nombre_apellido','LIKE','%'.$query.'%')
           ->orwhere('aparato','LIKE','%'.$query.'%')
           ->orwhere('marca','LIKE','%'.$query.'%')
           ->orderBy('idclienteaparato','desc')->get();
           return view('clienteap.cliente_aparato.index',["cliente_aparato"=>$cliente_aparato,"searchText"=>$query]);
        } 
    }

    public function create(){
    $marcas=DB::table('marcas')->get();
    $tipoaparato=DB::table('tipoaparato')->get();
        return view ("clienteap.cliente_aparato.create",["marcas"=>$marcas],["tipoaparato"=>$tipoaparato]);
    }

    public function store(Cliente_aparatoFormRequest $request){

        $cliente_aparato=new Cliente_aparato;
        $cliente_aparato->nombre_apellido=$request->get('nombre_apellido');
        $cliente_aparato->direccion=$request->get('direccion');
        $cliente_aparato->telefono=$request->get('telefono');
        $cliente_aparato->aparato=$request->get('aparato');
        $cliente_aparato->marca=$request->get('marca');
        $cliente_aparato->modelo=$request->get('modelo');
        $cliente_aparato->descripcion=$request->get('descripcion');
        $cliente_aparato->estado=$request->get('estado');
     //   $mytime= Carbon:: now('America/Tegucigalpa');
        $cliente_aparato->f_ingreso=$request->get('f_ingreso');

        $cliente_aparato->f_entrega=$request->get('f_entrega');
        if (Input::hasFile('imagenaparato')){
            $file=Input::file('imagenaparato');
            $file->move(public_path().'/imagenes/cliente_aparato/',$file->getClientOriginalName());
            $cliente_aparato->imagenaparato=$file->getClientOriginalName();
        }
        $cliente_aparato->cobro=$request->get('cobro');
        $cliente_aparato->save();
        return Redirect::to('clienteap/cliente_aparato');
    }

    public function show($id)
    {
        return view("clienteap.cliente_aparato.show",["cliente_aparato"=>Cliente_aparato::findOrFail($id)]);
    }
    public function edit($id)
    {
        $marcas=DB::table('marcas')->get();
        $tipoaparato=DB::table('tipoaparato')->get();
        return view("clienteap.cliente_aparato.edit",["cliente_aparato"=>Cliente_aparato::findOrFail($id),"marcas"=>$marcas,"tipoaparato"=>$tipoaparato]);   
    }
    public function update(Cliente_aparatoFormRequest $request,$id)
    {
        $cliente_aparato=Cliente_aparato::findOrFail($id);       
        $cliente_aparato->nombre_apellido=$request->get('nombre_apellido');
        $cliente_aparato->direccion=$request->get('direccion');
        $cliente_aparato->telefono=$request->get('telefono');
        $cliente_aparato->aparato=$request->get('aparato');
        $cliente_aparato->marca=$request->get('marca');
        $cliente_aparato->modelo=$request->get('modelo');
        $cliente_aparato->descripcion=$request->get('descripcion');
        $cliente_aparato->estado=$request->get('estado');
        $cliente_aparato->f_ingreso=$request->get('f_ingreso');
        $cliente_aparato->f_entrega=$request->get('f_entrega');
        if (Input::hasFile('imagenaparato')){
            $file=Input::file('imagenaparato');
            $file->move(public_path().'/imagenes/cliente_aparato/',$file->getClientOriginalName());
            $cliente_aparato->imagenaparato=$file->getClientOriginalName();
        }
        $cliente_aparato->cobro=$request->get('cobro');
        $cliente_aparato->update();
        return Redirect::to('clienteap/cliente_aparato');
    }

    public function destroy(EntregaFormRequest $request,$id)
    {
    //esta va a servir para entregar aparatos
        //revisar esto despues
        $cliente_aparato=Cliente_aparato::findOrFail($id);
        $cliente_aparato->f_entrega=$request->get('f_entrega');
        $cliente_aparato->estado=$request->get('estado');
        $cliente_aparato->cobro=$request->get('cobro');
        $condicion=$request->get('condicion');
       // $cliente_aparato->estado='Entregado';
       // $cliente_aparato->f_entrega='hoy';
       if($condicion=='1'){
        $cliente_aparato->update();
        return Redirect::to('clienteap/cliente_aparato');
        
       }else{
        $aparatosh=DB::table('cliente_aparato')->where('idclienteaparato','=',$id)->delete();
        return Redirect::to('clienteap/cliente_aparato');
       }
    }  
   

    public function entregar(){
           //$query=trim($request->get('searchText')); 
           $cliente_aparato=DB::table('cliente_aparato')->where('estado','=','Revisado-sin solución')
           ->orwhere('estado','=','Reparado-sin entregar')->get();
           return view ('clienteap.entregar.entregar',["cliente_aparato"=>$cliente_aparato]);
    }
    
    public function graficas(Request $request){
       // $today = today();
        $hoy= Carbon:: today('America/Tegucigalpa');
        $aparatos=DB::table('cliente_aparato')->where('f_entrega','=',$hoy)
        ->where('estado','=','recibido')
        ->Count();
        //para los aparatos en huesera en su grafica de pastel
        $tipoap=array();
        $cantidadtipos=array();
        $colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold","gray","black","white","red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");
        $tipoaparato=DB::table('tipoaparato')->get();
        foreach ($tipoaparato as $tipo) {
            $cantidadtotal=0;
            $huesera=DB::table('aparatosh')->select('tipo','cantidad')
            ->where('tipo','=',($tipo->nombre) )->get();
            foreach($huesera as $h){
                $cantidadtotal+=($h->cantidad);
            }
            if($cantidadtotal>0){
                array_push($cantidadtipos,($cantidadtotal));
                array_push($tipoap,($tipo->nombre));
            }
          }
        //para la caja de piezas por pedir;
        $papedir=DB::table('papedir')->count();
        //para los cobros del mes actual;
        $mes=Carbon::now()->month;
        $anioactual=Carbon::now()->year;
        $cobrosmes=DB::table('cliente_aparato')->select('f_entrega','estado','cobro')
        ->where('estado','=','Entregado-Reparado')->whereYear('f_entrega','=',$anioactual)->wheremonth('f_entrega','=',$mes)->get();
        $cobrosdelmes=0;
          foreach($cobrosmes as $c){
                $cobrosdelmes+=($c->cobro);
          }

          //para ver los aparatos a reparar dentro de 6 dias
          $proximos=Carbon::today()->addDays(6);
          $areparar=DB::table('cliente_aparato')->whereBetween('f_entrega',[$hoy,$proximos])
         ->where('estado','=','recibido')
            ->Count();
        ///esta parte es para las graficas de aparatos recibidos vs reparados-entregados
    if($request){
        $ano=Carbon::now()->year;
        $añobuscar=trim($request->get('añobuscar')); 
        if($añobuscar==null){$añobuscar=$ano;}
            $cantrecibidos=array();
            $cantreparados=array();
            $meses=array("ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic");
            //$mesencursbus= "%2019-".$m."-%";
           
            $anorecibido=$añobuscar;
            if($anorecibido==$ano){
                    $finmes=$mes;
            }else{
                        $finmes=12; 
                        $ano=$anorecibido;
                    }
                    //para que recorra los meses del año y cuente los aparatos que se reciben cada mes y que se almacenen en un array 
                    //en el mismo ciclo colocamos la consulta de aparatos reparados-entregados
                    for($i=1;$i<=$finmes;$i++){
                            if($i<10){$m='0'.$i;}else{$m=$i;}
                            $consulta=DB::table('cliente_aparato')->where('f_ingreso','LIKE','%'.$ano.'-'.$m.'-%')
                            ->Count();
                            array_push($cantrecibidos,$consulta);
                            
                            $consultaap=DB::table('cliente_aparato')->where('f_entrega','LIKE','%'.$ano.'-'.$m.'-%')
                            ->where('estado','=','Entregado-Reparado')
                            ->Count();
                            array_push($cantreparados,$consultaap);
                    }
    }

                        //para ver la grafica de cobros del año;
    if($request){                   
                    $cobrosaño=array();
                    $mesgraf=array();
                    $anorecibidocobro=trim($request->get('añobuscarcobro'));
                    $ano=Carbon::now()->year;
                    if($anorecibidocobro==null){$anorecibidocobro=$ano;}
                    if($anorecibidocobro==$ano){
                            $finmesc=$mes;
                    }else{
                            $finmesc=12;
                           $ano=$anorecibidocobro;  
                        }
                            //para que recorra los meses del año y consute el cobro de cada mes y lo sume y que se almacenen en un array 
                            for($i=1;$i<=$finmesc;$i++){
                                    if($i<10){$m='0'.$i;}else{$m=$i;}
                                    $consultac=DB::table('cliente_aparato')->where('f_entrega','LIKE','%'.$ano.'-'.$m.'-%')
                                    ->where('estado','=','Entregado-Reparado')->get();
                                    $cobromes=0;
                                         foreach($consultac as $c){
                                            $cobromes+=($c->cobro);
                                        }
                                    array_push($cobrosaño,$cobromes);
                                    $mesgraflinea=$ano.'-'.$m;
                                    array_push($mesgraf,$mesgraflinea);
                            }
        }
        
  return view ("clienteap.graficas.graficas",["aparatos"=>$aparatos,"cantidadtipos"=>$cantidadtipos,"tipoap"=>$tipoap,
                "colores"=>$colores,"papedir"=>$papedir,"cobrosdelmes"=>$cobrosdelmes,"areparar"=>$areparar,
                "cantrecibidos"=>$cantrecibidos,"cantreparados"=>$cantreparados,"meses"=>$meses,"cobrosaño"=>$cobrosaño,
                "mesgraf"=>$mesgraf,"añobuscar"=>$añobuscar,"añobuscarcobro"=>$anorecibidocobro]);
        }
}
