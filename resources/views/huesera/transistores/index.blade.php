@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Transistores    <a href="transistores/create"><button class="btn btn-success">Nuevo</button></a></h3>
<!--@include('huesera/transistores/search')-->
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
                    <th>Cantidad</th>
                    <th>Contenedor</th>
					<th>Opciones</th>
				</thead>
               @foreach ($transistores as $cat)
				<tr>
					<td>{{$envio=$cat->idtransistores}}</td>
                    <td>{{ $cat->nomenclatura}}</td>
                    <td>{{ $cat->descripcion}}</td>
                    <td>{{ $cat->cantidad}}</td>
                    <td>{{ $cat->contenedor}}</td>
					<td>
						<a href="{{URL::action('TransistoresController@edit',$envio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>
				@include('huesera/transistores/modal')
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
