@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Control remoto: <br>
             {{$controles->marca}}   {{$controles->modelo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($controles,['method'=>'PATCH','route'=>['huesera.controles.update',$controles->id], 'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="marca">Marca</label>
				<input type="text" name="marca" list="listamarcas" class="form-control" value="{{$controles->marca}}" >
				<datalist id="listamarcas" >
					@foreach ($marcas as $marc)
						<option value='{{$marc->nombre}}'>{{$marc->nombre}}</option>				 
					@endforeach			
				</datalist>
            </div>
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="{{$controles->modelo}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$controles->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            		<input type="file" name="imagen" class="form-control">
					@if(($controles->imagen)!="")
						<img src="{{asset('imagenes/controles/'.$controles->imagen)}}" height="300px" width="400px">
					@endif
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

    @endsection