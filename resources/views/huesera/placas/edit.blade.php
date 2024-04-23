@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Placa: <br>
             {{$placas->marca}}   {{$placas->modelo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($placas,['method'=>'PATCH','route'=>['huesera.placas.update',$placas->idplacas], 'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="marca">Marca</label>
				<input type="text" name="marca" list="listamarcas" class="form-control" value="{{$placas->marca}}" >
				<datalist id="listamarcas" >
					@foreach ($marcas as $marc)
						<option value='{{$marc->nombre}}'>{{$marc->nombre}}</option>				 
					@endforeach			
				</datalist>
            </div>
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="{{$placas->modelo}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$placas->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="foto">Foto</label>
            		<input type="file" name="foto" class="form-control">
					@if(($placas->foto)!="")
						<img src="{{asset('imagenes/placas/'.$placas->foto)}}" height="400px" width="500px">
					@endif
            </div>
			<div class="form-group">
            	<label for="foto2">Foto 2</label>
            		<input type="file" name="foto2" class="form-control">
					@if(($placas->foto2)!="")
						<img src="{{asset('imagenes/placas/'.$placas->foto2)}}" height="400px" width="500px">
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