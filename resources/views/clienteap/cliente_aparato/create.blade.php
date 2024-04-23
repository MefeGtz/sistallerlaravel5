@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso de Aparato</h3>
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

			{!!Form::open(array('url'=>'clienteap/cliente_aparato','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre_apellido">Nombre y apellido de cliente </label>
            			<input type="text" name="nombre_apellido" required value="{{old('nombre_apellido')}}"class="form-control" placeholder="Nombre y apellido...">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="direccion">Dirección</label>
            			<input type="text" name="direccion" required value="{{old('direccion')}}"class="form-control" placeholder="Dirección...">
                	 </div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="telefono">Teléfono</label>
            			<input type="number" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
                	 </div>
				</div>

				{{-- paprte del aparato--}}
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="aparato">Aparato</label>
						<input type="text" name="aparato" required value="{{old('aparato')}}" list="listaaparatos"  class="form-control" placeholder="Seleccione o ingrese el tipo de aparato ">
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
						<input type="text" name="marca" list="listamarcas" required value="{{old('marca')}}" class="form-control" placeholder="Marca...">
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
            		<input type="text" name="modelo" required value="{{old('modelo')}}" class="form-control" placeholder="Modelo...">
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="descripcion">Descripción</label>
            		<input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripción...">
            	</div>
			</div>

			<
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="f_ingreso">Fecha de Ingreso</label>
            		<input type="date" name="f_ingreso" required value="{{old('f_ingreso')}}" class="form-control">
            	</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            		<label for="f_entrega">Fecha de Entrega</label>
            		<input type="date" name="f_entrega" class="form-control" placeholder="Estado...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            		<label for="imagenaparato">Imagen</label>
            		<input type="file" name="imagenaparato" class="form-control">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="cobro">Cobro</label>
            		<input type="number" name="cobro"  class="form-control" placeholder="Cobro...">
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