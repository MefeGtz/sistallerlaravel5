<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modal-grafica1">                                     
 {!! Form::open(array('url'=>'clienteap/graficas','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                       
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#3c8dbc; color:white">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ver Grafica</h4>
			</div>
			<div class="modal-body">
				<p>Ingrese el año del cual desea ver la gráfica</p>
				<div class="form-group">
                          <div class="input-group">
                            <input type="number" class="form-control" name="añobuscar" placeholder="Ingrese el año del cual desea ver la grafica" value="{{$añobuscar}}">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary">Ver grafica</button>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            
                            </span>
                          </div>
                        </div>
			</div>
		</div>
	</div>
{{Form::close()}}
</div>


