@extends('layouts.admin')
@section('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Aparato en huesera: <br>
             {{$otros->tipo}}    {{$otros->nomenclatura}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($otros,['method'=>'PATCH','route'=>['huesera.otros.update',$otros->idotros], 'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Tipo">Tipo</label>
				<input type="text" name="Tipo" required value="{{$otros->Tipo}}"  class="form-control"  >
            </div>
        
            <div class="form-group">
            	<label for="nomenclatura">Modelo</label>
            	<input type="text" name="nomenclatura" class="form-control" value="{{$otros->nomenclatura}}" >
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$otros->descripcion}}" >
            </div>
            <div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="number" name="cantidad" class="form-control" value="{{$otros->cantidad}}">
            </div>
            <div class="form-group">
            	<label for="contenedor">Contenedor</label>
            	<input type="text" name="contenedor" class="form-control" value="{{$otros->contenedor}}">
            </div>
			<div class="form-group">
            	<label for="foto">Foto</label>
            		<input type="file" name="foto" class="form-control">
					@if(($otros->foto)!="")
						<img src="{{asset('imagenes/otros/'.$otros->foto)}}" height="400px" width="500px">
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