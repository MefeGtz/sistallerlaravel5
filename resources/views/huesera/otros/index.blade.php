@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Otros-Huesera <a href="otros/create"><button class="btn btn-success">Nuevo</button></a></h3>

<!--@include('huesera/otros/search')-->
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover dt-responsive" id="tabla">
		<thead>
					<th>Id</th>
                    <th>Tipo</th>
                    <th>Nomenclatura</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Contenedor</th>
					<th>Foto</th>
					<th>Opciones</th>
				</thead>
               @foreach ($otros as $cat)
				<tr>
					<td>{{$envio=$cat->idotros}}</td>
                    <td>{{ $cat->Tipo}}</td>
					<td>{{ $cat->nomenclatura}}</td>
                    <td>{{ $cat->descripcion}}</td>
                    <td>{{ $cat->cantidad}}</td>
					<td>{{ $cat->contenedor}}</td>
					<td><a href="" data-target="#modal-imagen-{{$envio}}" data-toggle="modal">
						<img src="{{asset('imagenes/otros/'.$cat->foto)}}"
 						alt="{{$cat->foto}}" height="220px" width="200px" class="img-thumbnail"> </a></td> 
					<td>
						<a href="{{URL::action('OtrosController@edit',$envio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>
				@include('huesera/otros/show')
				@include('huesera/otros/modal')
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
