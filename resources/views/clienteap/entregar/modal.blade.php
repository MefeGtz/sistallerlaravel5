<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" 
 tabindex="-1" id="modal-delete-{{$cat->idclienteaparato}}">
 {{Form::Open(array('action'=>array('Cliente_aparatoController@destroy',$cat->idclienteaparato),'method'=>'delete'))}}
	{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background:#3c8dbc; color:white">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Entregar {{$cat->aparato}}  {{$cat->marca}} a {{$cat->nombre_apellido}}</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Entregar el aparato al cliente</p>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="estado">El aparato pasara al siguiente estado:</label>
					<select name="estado" class="form-control">
					@if (($cat->estado)=="Revisado-sin solución")
					<option value="Entregado-sin solución" selected>Entregado-sin solución</option>
					<option value="Entregado-Reparado">Entregado-Reparado</option>
					@else
					<option value="Entregado-Reparado" selected>Entregado-Reparado</option>
					<option value="Entregado-sin solución">Entregado-sin solución</option>
			@endif
					</select>
            	</div>
			</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            		<label for="f_entrega">Fecha de Entrega</label>
            		<input type="date" name="f_entrega"  value="{{$cat->f_entrega}}" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="cobro">Cobro</label>
            		<input type="number" name="cobro" value="{{$cat->cobro}}" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<input  type="hidden" name="condicion" value="1" class="form-control">
            	</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}		
</div>


