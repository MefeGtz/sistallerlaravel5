@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pantallas-Huesera   <a href="pantallas/create"><button class="btn btn-success">Nuevo</button></a></h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover dt-responsive" id="tabla">
				<thead>
					<th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th>Ubicación</th>
					<th>Opciones</th>
				</thead>
               @foreach ($pantallas as $cat)
				<tr>
					<td>{{$envio=$cat->idpantallas}}</td>
                    <td>{{ $cat->marca}}</td>
					<td>{{ $cat->modelo}}</td>
                    <td>{{ $cat->descripcion}}</td>
                    <td>{{ $cat->cantidad}}</td>
                    <td><a href="" data-target="#modal-imagen-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/pantallas/'.$cat->imagen)}}"
 						alt="{{$cat->imagen}}" height="220px" width="300px" class="img-thumbnail"> </a></td>
                    <td>{{ $cat->ubicacion}}</td>
					<td>
						<a href="{{URL::action('PantallasController@edit',$envio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>
				@include('huesera/pantallas/show')
				@include('huesera/pantallas/modal')
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
