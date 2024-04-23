@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Datos de Cliente-Aparato <br>
             {{$cliente_aparato->nombre_apellido}}  {{$cliente_aparato->aparato}}   {{$cliente_aparato->marca}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			</div>
			</div>

			{!!Form::model($cliente_aparato,['method'=>'PATCH','route'=>['clienteap.cliente_aparato.update',$cliente_aparato->idclienteaparato], 'files'=>'true'])!!}
            {{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre_apellido">Nombre y apellido de cliente </label>
            			<input type="text" name="nombre_apellido" required value="{{$cliente_aparato->nombre_apellido}}"class="form-control">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="direccion">Dirección</label>
            			<input type="text" name="direccion" required value="{{$cliente_aparato->direccion}}"class="form-control">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="telefono">Teléfono</label>
            			<input type="number" name="telefono" value="{{$cliente_aparato->telefono}}" class="form-control">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="aparato">Aparato</label>
						<input type="text" name="aparato" required value="{{$cliente_aparato->aparato}}" list="listaaparatos"  class="form-control">
							<datalist id="listaaparatos">
								@foreach($tipoaparato as $tipo)
									<option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
								@endforeach
							</datalist>
		            </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
            			<label for="marca">Marca</label>
						<input type="text" name="marca" list="listamarcas" class="form-control" value="{{$cliente_aparato->marca}}" >
				<datalist id="listamarcas" >
					@foreach ($marcas as $marc)
						<option value='{{$marc->nombre}}'>{{$marc->nombre}}</option>				 
					@endforeach			
				</datalist>
            			</div>
				</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="modelo">Modelo</label>
            		<input type="text" name="modelo" required value="{{$cliente_aparato->modelo}}" class="form-control">
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="descripcion">Descripción</label>
            		<input type="text" name="descripcion" required value="{{$cliente_aparato->descripcion}}" class="form-control" >
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="estado">Estado</label>
					<select name="estado" class="form-control">
					<option value="{{$cliente_aparato->estado}}" selected >{{$cliente_aparato->estado}}</option>	
					<option value="Recibido">Recibido</option>
					<option value="Revisado-sin solución">Revisado-sin solución</option>
					<option value="Reparado-sin entregar">Reparado-sin entregar</option>
					<option value="Entregado-sin solución">Entregado-sin solución</option>
					<option value="Entregado-Reparado">Entregado-Reparado</option>
					</select>
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="f_ingreso">Fecha de Ingreso</label>
            		<input type="date" name="f_ingreso" required value="{{$cliente_aparato->f_ingreso}}" class="form-control">
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			
			
            		<label for="f_entrega">Fecha de Entrega</label>
            		<input type="date" name="f_entrega"  value="{{$fecha=$cliente_aparato->f_entrega}}" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            		<label for="imagenaparato">Imagen</label>
            		<input type="file" name="imagenaparato" class="form-control">
					@if(($cliente_aparato->imagenaparato)!="")
						<img src="{{asset('imagenes/cliente_aparato/'.$cliente_aparato->imagenaparato)}}" height="400px" width="500px">
					@endif
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="cobro">Cobro</label>
            		<input type="number" name="cobro" value="{{$cliente_aparato->cobro}}" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar</button>
            		<button class="btn btn-danger" type="reset">Cancelar</button>
            	</div>
			</div>
		</div>

			{!!Form::close()!!}		
            
    @endsection