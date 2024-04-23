@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Aparato en huesera: <br>
             {{$papedir->tipo}}  {{$papedir->nomenclatura}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($papedir,['method'=>'PATCH','route'=>['pedir.papedir.update',$papedir->idpapedir], 'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="tipo">Tipo</label>
				<input type="text" name="tipo" required value="{{$papedir->tipo}}"  class="form-control">
            </div>
            
            <div class="form-group">
            	<label for="nomenclatura">nomenclatura</label>
            	<input type="text" name="nomenclatura" class="form-control" value="{{$papedir->nomenclatura}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$papedir->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="number" name="cantidad" class="form-control" value="{{$papedir->cantidad}}">
            </div>
            <div class="form-group">
            	<label for="imagen">Imagen</label>
            		<input type="file" name="imagen" class="form-control">
					@if(($papedir->imagen)!="")
						<img src="{{asset('imagenes/papedir/'.$papedir->imagen)}}" height="400px" width="500px">
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