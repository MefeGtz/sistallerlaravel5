@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso de Pantalla para huesera</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'huesera/pantallas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label for="marca">Marca</label>		
					<input type="text" name="marca" list="listamarcas" required value="{{old('marca')}}" class="form-control" placeholder="Marca...">
						<datalist id="listamarcas" >
							@foreach ($marcas as $marc)
								<option value='{{$marc->nombre}}'>{{$marc->nombre}}</option>				 
							@endforeach			
						</datalist>
            </div>
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="{{old('modelo')}}" placeholder="Modelo...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="number" name="cantidad" required value="{{old('cantidad')}}" class="form-control">
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            		<input type="file" name="imagen" class="form-control">
            </div>
            <div class="form-group">
            	<label for="ubicacion">Ubicación</label>
            	<input type="text" name="ubicacion" required value="{{old('ubicacion')}}" class="form-control" placeholder="Ubicacion...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

@endsection