@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso de Placa</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'huesera/placas','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
            	<label for="foto">Foto</label>
            		<input type="file" name="foto" class="form-control">
            </div>
			<div class="form-group">
            	<label for="foto">Foto 2</label>
            		<input type="file" name="foto2" class="form-control">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

@endsection