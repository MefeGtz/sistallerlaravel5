@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Registro de Fallas <a href="fallas/create"><button class="btn btn-success">Nuevo</button></a></h3>
<!--@include('huesera/placas/search')-->
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover dt-responsive" id="tabla">
				<thead>
					<th>Id</th>
					<th>Título</th>
					<th>Aparato</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Foto</th>
					<th>Foto 2</th>
					<th>Opciones</th>
				</thead>
               @foreach ($fallas as $cat)
				<tr>
					<td>{{$envio=$cat->id}}</td>
					<td>{{ $cat->titulo}}</td>
					<td>{{ $cat->aparato}}</td>
                    <td>{{ $cat->marca}}</td>
					<td>{{ $cat->modelo}}</td>
                    <td>{{ $cat->descripcion}}</td>
                    <td><a href="" data-target="#modal-imagen-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/fallas/'.$cat->foto)}}"
 						alt="{{$cat->foto}}" height="180px" width="170px" class="img-thumbnail"> </a>
					</td>
					<td> <a href="" data-target="#modal-imagen2-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/fallas/'.$cat->foto2)}}"
 						alt="{{$cat->foto2}}" height="180px" width="170px" class="img-thumbnail"></a>
					</td>
					<td>
						<a href="{{URL::action('FallasController@edit',$envio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>
				@include('fallas/fallas/show')
				@include('fallas/fallas/modal')
				@endforeach
			</table>
		</div> 
	</div>
</div>
@endsection