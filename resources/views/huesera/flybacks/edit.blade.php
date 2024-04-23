@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Flyback:<br>
             {{$flybacks->nomenclatura}}   {{$flybacks->descripcion}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($flybacks,['method'=>'PATCH','route'=>['huesera.flybacks.update',$flybacks->idflybacks], 'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nomenclatura">Nomenclatura</label>
            	<input type="text" name="nomenclatura" class="form-control" value="{{$flybacks->nomenclatura}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$flybacks->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="foto">Foto</label>
            		<input type="file" name="foto" class="form-control">
					@if(($flybacks->foto)!="")
						<img src="{{asset('imagenes/flybacks/'.$flybacks->foto)}}" height="400px" width="500px">
					@endif
            </div>
			<div class="form-group">
            	<label for="foto2">Foto 2</label>
            		<input type="file" name="foto2" class="form-control">
					@if(($flybacks->foto2)!="")
						<img src="{{asset('imagenes/flybacks/'.$flybacks->foto2)}}" height="400px" width="500px">
					@endif
            </div>
			<div class="form-group">
            	<label for="foto3">Foto 3</label>
            		<input type="file" name="foto3" class="form-control">
					@if(($flybacks->foto3)!="")
						<img src="{{asset('imagenes/flybacks/'.$flybacks->foto3)}}" height="400px" width="500px">
					@endif
            </div>
            <div class="form-group">
            	<label for="ubicacion">Ubicación</label>
            	<input type="text" name="ubicacion" class="form-control" value="{{$flybacks->ubicacion}}">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

    @endsection