@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Pantalla en huesera: <br>
             {{$pantallas->marca}}   {{$pantallas->modelo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($pantallas,['method'=>'PATCH','route'=>['huesera.pantallas.update',$pantallas->idpantallas], 'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="marca">Marca</label>
				<input type="text" name="marca" list="listamarcas" class="form-control" value="{{$pantallas->marca}}" >
				<datalist id="listamarcas" >
					@foreach ($marcas as $marc)
						<option value='{{$marc->nombre}}'>{{$marc->nombre}}</option>				 
					@endforeach			
				</datalist>
            </div>
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="{{$pantallas->modelo}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$pantallas->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="number" name="cantidad" class="form-control" value="{{$pantallas->cantidad}}">
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            		<input type="file" name="imagen" class="form-control">
					@if(($pantallas->imagen)!="")
						<img src="{{asset('imagenes/pantallas/'.$pantallas->imagen)}}" height="400px" width="500px">
					@endif
            </div>
            <div class="form-group">
            	<label for="ubicacion">Ubicación</label>
            	<input type="text" name="ubicacion" class="form-control" value="{{$pantallas->ubicacion}}">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

    @endsection