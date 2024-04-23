@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Flybacks   <a href="flybacks/create"><button class="btn btn-success">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover dt-responsive" id="tabla">
				<thead>
					<th>Id</th>
                    <th>Nomenclatura</th>
                    <th>Descripción</th>
                    <th>Foto</th>
					<th>Foto2</th>
					<th>Foto3</th>
                    <th>Ubicación</th>
					<th>Opciones</th>
				</thead>
               @foreach ($flybacks as $cat)
				<tr>
					<td>{{$envio=$cat->idflybacks}}</td>
                    <td>{{ $cat->nomenclatura}}</td>
                    <td>{{ $cat->descripcion}}</td>
                    <td><a href="" data-target="#modal-imagen-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/flybacks/'.$cat->foto)}}"
 						alt="{{$cat->foto}}" height="150px" width="120px" class="img-thumbnail"> </a></td>
				    <td><a href="" data-target="#modal-imagen2-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/flybacks/'.$cat->foto2)}}"
 						alt="{{$cat->foto2}}" height="150px" width="120px" class="img-thumbnail"> </a></td>
					<td><a href="" data-target="#modal-imagen3-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/flybacks/'.$cat->foto3)}}"
 						alt="{{$cat->foto3}}" height="150px" width="120px" class="img-thumbnail"> </a></td>
                    <td>{{ $cat->ubicacion}}</td>
					<td>
						<a href="{{URL::action('FlybacksController@edit',$envio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>
				@include('huesera/flybacks/show')
				@include('huesera/flybacks/modal')
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
