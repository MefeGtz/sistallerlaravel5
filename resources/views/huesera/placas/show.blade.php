        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modal-imagen-{{$cat->idplacas}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<!--=====================================
            CABEZA DEL MODAL
            ======================================-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Imagen</h4>
                 </div>
            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->
                <div class="modal-body">
                        <img src="{{asset('imagenes/placas/'.$cat->foto)}}" alt="{{$cat->foto}}" class="modal-content " width="100%" height="70%">
             </div>
            <!--=====================================
            PIE DEL MODAL
            ======================================  
            <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            </div>-->
            <!--=====================================
            FIN DEL MODAL
            ======================================-->
		</div>
	</div>
</div>

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modal-imagen2-{{$cat->idplacas}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<!--=====================================
            CABEZA DEL MODAL
            ======================================-->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Imagen</h4>
                 </div>
            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->
                <div class="modal-body">
                        <img src="{{asset('imagenes/placas/'.$cat->foto2)}}" alt="{{$cat->foto2}}" class="modal-content " width="100%" height="70%">
             </div>
            <!--=====================================
            PIE DEL MODAL
            ======================================  
            <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            </div>-->
            <!--=====================================
            FIN DEL MODAL
            ======================================-->
		</div>
	</div>
</div>