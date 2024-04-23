<?php

namespace sistallerl5\Http\Controllers;

use Illuminate\Http\Request;

use sistallerl5\Http\Requests;

class AcercadeController extends Controller
{
    //
    public Function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        return view('acercade.index');
    }

}
