@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ingreso de Flyback</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'huesera/flybacks','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nomenclatura">Nomenclatura</label>
            	<input type="text" name="nomenclatura" class="form-control" value="{{old('nomenclatura')}}" placeholder="Nomenclatura...">
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
            	<label for="foto2">Foto 2</label>
            		<input type="file" name="foto2" class="form-control">
            </div>
			<div class="form-group">
            	<label for="foto3">Foto 3</label>
            		<input type="file" name="foto3" class="form-control">
            </div>
			<div class="form-group">
            	<label for="ubicacion">Ubicación</label>
            	<input type="text" name="ubicacion" class="form-control" value="{{old('ubicacion')}}" placeholder="Ubicación...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection