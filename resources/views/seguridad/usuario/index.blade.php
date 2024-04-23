@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3> <center>Listado de Usuarios </center></h3>
		<center> <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a></center>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover dt-responsive " id="tabla">
				<thead>
					<th>Id</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $cat)
				<tr>
					<td>{{$envio=$cat->id}}</td>
                    <td>{{ $cat->name}}</td>
                    <td>{{ $cat->email}}</td>
					<td>
						<a href="{{URL::action('usuarioController@edit',$envio)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                         <a href="" data-target="#modal-delete-{{$envio}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
					</td>
                </tr>
				@include('seguridad/usuario/modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>
@endsection
