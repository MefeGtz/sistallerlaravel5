        <div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modal-imagen-{{$cat->idpapedir}}">
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
                <img src="{{asset('imagenes/papedir/'.$cat->imagen)}}" alt="{{$cat->imagen}}" class="modal-content " width="100%" height="70%">
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