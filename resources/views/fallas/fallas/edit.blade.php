@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Falla: <br>
			{{$fallas->aparato}} {{$fallas->marca}}   {{$fallas->modelo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($fallas,['method'=>'PATCH','route'=>['fallas.fallas.update',$fallas->id], 'files'=>'true'])!!}
            {{Form::token()}}

			<div class="form-group">
            	<label for="titulo">Título</label>
            	<input type="text" name="titulo" class="form-control" value="{{$fallas->titulo}}" >
            </div>
			<div class="form-group">
            	<label for="aparato">Tipo de aparato</label>
				<input type="text" name="aparato" required value="{{$fallas->aparato}}" list="listaaparatos"  class="form-control">
				<datalist id="listaaparatos">
					@foreach($tipoaparato as $tipo)
					<option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
					@endforeach
				</datalist>
            </div>
            <div class="form-group">
            	<label for="marca">Marca</label>
				<input type="text" name="marca" list="listamarcas" class="form-control" value="{{$fallas->marca}}" >
				<datalist id="listamarcas" >
					@foreach ($marcas as $marc)
						<option value='{{$marc->nombre}}'>{{$marc->nombre}}</option>				 
					@endforeach			
				</datalist>
            </div>
            <div class="form-group">
            	<label for="modelo">Modelo</label>
            	<input type="text" name="modelo" class="form-control" value="{{$fallas->modelo}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$fallas->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="foto">Foto</label>
            		<input type="file" name="foto" class="form-control">
					@if(($fallas->foto)!="")
						<img src="{{asset('imagenes/fallas/'.$fallas->foto)}}" height="400px" width="500px">
					@endif
            </div>
			<div class="form-group">
            	<label for="foto2">Foto 2</label>
            		<input type="file" name="foto2" class="form-control">
					@if(($fallas->foto2)!="")
						<img src="{{asset('imagenes/fallas/'.$fallas->foto2)}}" height="400px" width="500px">
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