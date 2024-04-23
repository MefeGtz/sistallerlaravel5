@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Circuito Integrado: <br>
             {{$ics->nomenclatura}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($ics,['method'=>'PATCH','route'=>['huesera.ics.update',$ics->idics]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nomenclatura">Nomenclatura</label>
            	<input type="text" name="nomenclatura" class="form-control" value="{{$ics->nomenclatura}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion"  value="{{$ics->descripcion}}" class="form-control">
            </div>
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="number" name="cantidad" required value="{{$ics->cantidad}}" class="form-control">
            </div>
           
            <div class="form-group">
            	<label for="contenedor">Contenedor</label>
            	<input type="text" name="contenedor" value="{{$ics->contenedor}}" class="form-control" >
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

    @endsection