@extends ('layouts.admin')
@section ('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
        <h3>Acerca de...</h3>
            <div class="panel panel-default"> 
                <div class="panel-heading">
                      <center>  <img src="{{asset('img/cabeceralogin.png')}}" class="img-responsive"></center>
                </div>
                <div class="panel-body">
               <p><b> Desarrollado por:</b> <span>MXXXXX-FXXXXXXX-GXXXXXXXX</span></p> 
               <br>
              <p><span>La aplicacion web fue desarollada para tener un mejor control de información
                       en un taller de reparación de electrodomésticos.</span> </p>   
                <p> Intibúca Honduras C.A <br>
                <b> Año 2020 </b></p>
                <p>version 1.0 </p>
                </div>
               
                
            </div>
        </div>
    </div>
</div>
@endsection
